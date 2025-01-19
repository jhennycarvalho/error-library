<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.livros.login.Login');
});

// Definição da rota 'biblioteca' com o controlador
Route::get('/biblioteca', [LivroController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('biblioteca');

// Rota para adicionar livro
Route::get('/adicionarlivro', function () {
    return view('pages.livros.administrador.adicionar-livro');
});

Route::post('/adicionarlivro', [LivroController::class, 'store'])->name('livros.store');

// Rota de cadastro de usuário
Route::get('/cadastrarusuario', function () {
    return view('pages.livros.administrador.cadastrar-usuario');
});

// Rota para o dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota para acessar os livros
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
