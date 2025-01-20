<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Livro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $emprestimos = Emprestimo::with(['usuario', 'livro'])
            ->when($request->id, fn ($query, $id) => $query->where('id_emprestimo', $id))
            ->when($request->nome, fn ($query, $nome) =>
                $query->whereHas('usuario', fn ($q) => $q->where('name', 'like', '%' . $nome . '%'))
            )
            ->get();

        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $usuarios = User::all();
        $livros = Livro::all();
        return view('emprestar', compact('usuarios', 'livros'));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'usuario_id' => 'required|exists:users,id', // Garantindo que o ID do usuário exista
            'livro_id' => 'required|exists:livros,id', // Garantindo que o ID do livro exista
            'data_emprestimo' => 'required|date_format:d-m-Y',
            'data_devolucao' => 'required|date_format:d-m-Y',
        ]);

        // Verificando se há exemplares disponíveis para o livro
        $livro = Livro::find($validated['livro_id']);
        if ($livro->exemplares_disponiveis <= 0) {
            return redirect()->back()->with('error', 'Não há exemplares disponíveis para este livro.');
        }

        // Convertendo as datas para o formato correto
        $dataEmprestimo = Carbon::createFromFormat('d-m-Y', $validated['data_emprestimo']);
        $dataDevolucao = Carbon::createFromFormat('d-m-Y', $validated['data_devolucao']);

        // Salvando o empréstimo no banco de dados
        Emprestimo::create([
            'usuario_id' => $validated['usuario_id'],
            'livro_id' => $validated['livro_id'],
            'data_emprestimo' => $dataEmprestimo,
            'data_devolucao' => $dataDevolucao,
        ]);

        // Atualizando o número de exemplares disponíveis do livro
        $livro->exemplares_disponiveis -= 1;
        $livro->save();

        // Retornando para a página de empréstimos com uma mensagem de sucesso
        return redirect()->route('biblioteca')->with('success', 'Empréstimo realizado com sucesso!');
    }

    public function edit(Emprestimo $emprestimo)
    {
        $usuarios = User::all();
        $livros = Livro::all();
        return view('emprestimos.edit', compact('emprestimo', 'usuarios', 'livros'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_emprestimo',
        ]);

        $emprestimo->update($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }

    public function buscarUsuario(Request $request)
    {
        $query = $request->input('query');
        $usuarios = User::where('name', 'like', "%{$query}%")
                        ->orWhere('id', 'like', "%{$query}%")
                        ->get();

        return response()->json($usuarios);
    }
}
