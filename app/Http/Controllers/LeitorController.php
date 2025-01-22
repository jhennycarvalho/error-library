<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use Illuminate\Http\Request;

class LeitorController extends Controller
{
    // Exibir uma lista de leitores
    public function index()
    {
        $leitores = Leitor::all(); // Obtém todos os leitores
        return view('leitores.index', compact('leitores')); // Retorna a view com a lista de leitores
    }

    // Mostrar o formulário para criar um novo leitor
    public function create()
    {
        return view('leitores.create'); // Retorna a view do formulário de criação
    }

    // Armazenar um novo leitor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:leitors',
            'num_matricula' => 'required|string|max:255',
            'serie' => 'required|string|max:255',
            'turno' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'endereco' => 'required|string|max:255',
        ]);

        Leitor::create($request->all()); // Salva os dados

        return redirect()->route('leitores.index')->with('success', 'Leitor cadastrado com sucesso!');
    }

    // Exibir um leitor específico
    public function show(Leitor $leitor)
    {
        return view('leitores.show', compact('leitor')); // Retorna a view do leitor específico
    }

    // Mostrar o formulário para editar um leitor
    public function edit(Leitor $leitor)
    {
        return view('leitores.edit', compact('leitor')); // Retorna a view do formulário de edição
    }

    // Atualizar um leitor existente
    public function update(Request $request, Leitor $leitor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:leitors,email,' . $leitor->id,
            // Validações adicionais conforme necessário
        ]);

        $leitor->update($request->all()); // Atualiza o leitor

        return redirect()->route('leitores.index')->with('success', 'Leitor atualizado com sucesso!');
    }

    // Remover um leitor
    public function destroy(Leitor $leitor)
    {
        $leitor->delete(); // Deleta o leitor

        return redirect()->route('leitores.index')->with('success', 'Leitor removido com sucesso!');
    }
}
