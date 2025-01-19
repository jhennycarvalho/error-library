<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function store(Request $request)
    {
        // Validation
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
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('livros');
        }

        // Save book data to database
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
        ]);

        return redirect()->back()->with('success', 'Livro adicionado com sucesso!');
    }

    public function index()
    {
        $livros = Livro::all();
        return view('pages.livros.administrador.biblioteca', compact('livros'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $livros = Livro::where('titulo', 'like', '%' . $query . '%')->get();
        return view('pages.livros.administrador.biblioteca', compact('livros'));
    }
}
    
