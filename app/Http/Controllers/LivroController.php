<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    // Método para criar um livro
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'required',
            'editora' => 'required|max:255',
            'publicacao_data' => 'required|date',
            'isbn' => 'required|numeric|digits:13',
            'localizacao' => 'required|max:255',
            'paginas' => 'required|numeric',
            'genero' => 'required|max:255',
            'idioma' => 'required|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
            'exemplares_disponiveis' => 'required|integer|min:0',
        ]);

        // Upload da imagem, se houver
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('livros');
        }

        // Salvar os dados do livro no banco de dados
        Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora' => $request->editora,
            'publicacao_data' => $request->publicacao_data,
            'isbn' => $request->isbn,
            'localizacao' => $request->localizacao,
            'paginas' => $request->paginas,
            'genero' => $request->genero,
            'idioma' => $request->idioma,
            'image_path' => $imagePath,
            'exemplares_disponiveis' => $request->exemplares_disponiveis,
        ]);

        return redirect()->back()->with('success', 'Livro adicionado com sucesso!');
    }

    // Método para listar todos os livros
    public function index()
    {
        $livros = Livro::all();
        return view('pages.livros.administrador.biblioteca', compact('livros'));
    }

    // Método para buscar livros
    public function search(Request $request)
    {
        $query = $request->input('search');
        $livros = Livro::where('titulo', 'like', '%' . $query . '%')->get();
        return view('pages.livros.administrador.biblioteca', compact('livros'));
    }

    // Método para editar um livro
    public function edit($id)
    {
        // Encontrar o livro pelo ID
        $livro = Livro::findOrFail($id);
        return view('pages.livros.administrador.editar-livro', compact('livro'));
    }

    // Método para atualizar um livro
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'required',
            'editora' => 'required|max:255',
            'publicacao_data' => 'required|date',
            'isbn' => 'required|numeric|digits:13',
            'localizacao' => 'required|max:255',
            'paginas' => 'required|numeric',
            'genero' => 'required|max:255',
            'idioma' => 'required|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
            'exemplares_disponiveis' => 'required|integer|min:0',
        ]);

        // Encontrar o livro pelo ID
        $livro = Livro::findOrFail($id);

        // Se uma nova imagem for carregada, fazer o upload e atualizar
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('livros');
            $livro->image_path = $imagePath;
        }

        // Atualizar os dados do livro
        $livro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora' => $request->editora,
            'publicacao_data' => $request->publicacao_data,
            'isbn' => $request->isbn,
            'localizacao' => $request->localizacao,
            'paginas' => $request->paginas,
            'genero' => $request->genero,
            'idioma' => $request->idioma,
            'exemplares_disponiveis' => $request->exemplares_disponiveis,
        ]);

        return redirect()->route('biblioteca')->with('success', 'Livro atualizado com sucesso!');
    }
}
