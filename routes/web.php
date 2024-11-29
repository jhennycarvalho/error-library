<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;  
use App\Http\Controllers\CadUsuarioController; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('pages.livros.login.Login');
});


Route::get('/biblioteca', function () {
    return view('pages.livros.administrador.biblioteca');
});


Route::get('/adicionarlivro', function () {
    return view('pages.livros.administrador.adicionar-livro');
});


Route::post('/adicionarlivro', [LivroController::class, 'store'])->name('livros.store');


Route::get('/cadastrarusuario', function () {
    return view('pages.livros.administrador.cadastrar-usuario');
});


Route::post('/cadastrarusuario', [CadUsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/biblioteca', [LivroController::class, 'index'])->name('pages.livros.administrador.biblioteca');

Route::get('livros/{filename}', function ($filename) {
    $path = storage_path('app/private/livros/' . $filename);
    if (file_exists($path)) {
        return Response::file($path);
    }
    abort(404);
});

