<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.livros.login.Login');
});


Route::get('/biblioteca', function () {
    return view('pages.livros.administrador.biblioteca');
});

Route::get('/adicionarlivro', function () {
    return view('pages.livros.administrador.adicionar-livro');
});

// Página de cadastro de usuário
Route::get('/cadastrarusuario', function () {
    return view('pages.livros.administrador.cadastrar-usuario');
});


Route::post('/cadastrarusuario', [CadUsuarioController::class, 'store'])->name('usuarios.store');
