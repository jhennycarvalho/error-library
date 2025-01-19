<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'num_matricula' => ['required', 'unique:users,num_matricula'],
            'serie' => ['required'],
            'turno' => ['required'],
            'telefone' => ['required'],
            'endereco' => ['required'],
        ]);

        // Criação do usuário
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'num_matricula' => $validated['num_matricula'],
            'serie' => $validated['serie'],
            'turno' => $validated['turno'],
            'telefone' => $validated['telefone'],
            'endereco' => $validated['endereco'],
        ]);

        // Redirecionamento após o cadastro
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}