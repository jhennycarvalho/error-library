<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;  
use App\Http\Controllers\CadUsuarioController; 


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
