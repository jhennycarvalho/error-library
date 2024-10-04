<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
});


Route::get('/Livros', function () {
    return view('pages.livros.index');
});

