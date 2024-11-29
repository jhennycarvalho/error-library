<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'descricao' => 'required',
            'editora' => 'required|max:255',
            'dia' => 'required|numeric|between:1,31',
            'mes' => 'required|numeric|between:1,12',
            'ano' => 'required|numeric|digits:4',
            'isbn' => 'required|numeric|digits:13',
            'localizacao' => 'required|max:255',
            'paginas' => 'required|numeric',
            'genero' => 'required|max:255',
            'idioma' => 'required|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Validação da imagem (até 20 MB)
        ]);

        // Armazenar a imagem, se houver
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('livros'); // Armazena a imagem na pasta 'livros'
        }

        // Formatar a data de publicação
        $publicacao_data = "{$request->ano}-{$request->mes}-{$request->dia}";

        // Salvar os dados do livro no banco de dados
        Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora' => $request->editora,
            'publicacao_data' => $publicacao_data, // Use a data formatada
            'isbn' => $request->isbn,
            'localizacao' => $request->localizacao,
            'paginas' => $request->paginas,
            'genero' => $request->genero,
            'idioma' => $request->idioma,
            'image_path' => $imagePath // Armazena o caminho da imagem, se houver
        ]);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Livro adicionado com sucesso!');
    }

    public function index()
    {
        $livros = Livro::all(); // Busca todos os livros no banco de dados
        return view('pages.livros.administrador.biblioteca', compact('livros')); 
    }
}
