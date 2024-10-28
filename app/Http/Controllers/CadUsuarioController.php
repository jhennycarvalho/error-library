<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadUsuarioController extends Controller
{
        public function store(Request $request)
        {
            // Apenas retornar uma mensagem de sucesso por enquanto
            return back()->with('success', 'Usuário cadastrado com sucesso!');
        }
    

}