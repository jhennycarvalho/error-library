<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;
use Illuminate\Support\Facades\Route;

// Rota de login (Página inicial)
Route::get('/', function () {
    return view('auth.login');
});

// Definição da rota 'biblioteca' com o controlador
Route::get('/biblioteca', [LivroController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('biblioteca');

// rota emprestar
Route::get('/emprestar', function () {
    return view('pages.livros.administrador.emprestar');
})->middleware(['auth', 'verified'])->name('emprestimos.form');

// Buscar usuário para empréstimo
Route::get('/buscar-usuario', [EmprestimoController::class, 'buscarUsuario'])->name('buscar.usuario');

// Rota para registrar o empréstimo
Route::post('/emprestimo', [EmprestimoController::class, 'store'])->middleware(['auth', 'verified'])->name('emprestimos.store');


// Rota para adicionar livro (Página de Adicionar Livro)
Route::get('/adicionarlivro', function () {
    return view('pages.livros.administrador.adicionar-livro');
})->middleware(['auth', 'verified'])->name('livros.create');

// Rota para salvar um novo livro
Route::post('/adicionarlivro', [LivroController::class, 'store'])->middleware(['auth', 'verified'])->name('livros.store');

// Rota para editar um livro (Página de Editar Livro)
Route::get('/editarlivro/{id}', [LivroController::class, 'edit'])->middleware(['auth', 'verified'])->name('livros.edit');

// Rota para atualizar um livro
Route::put('/livros/{id}', [LivroController::class, 'update'])->middleware(['auth', 'verified'])->name('livros.update');

// Rota para cadastrar um usuário
Route::get('/cadastrarusuario', function () {
    return view('pages.livros.administrador.cadastrar-usuario');
})->middleware(['auth', 'verified'])->name('usuarios.create');

/* Route::resource('leitores', LeitorController::class);
    return view('pages.livros.administrador.cadastrar-usuario'); */

########################################### ROTAS DA BIBLIOTECAAAAA AQUIIII ############################################################
Route::get('/dashboard', [LivroController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');





// Rota para o dashboard


// Rota para acessar livros do diretório privado
Route::get('livros/{filename}', function ($filename) {
    $path = storage_path('app/private/livros/' . $filename);
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
});

// Rotas protegidas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

