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
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
     // Adicionando o método create
     public function create(): View
     {
         return view('auth.register');
     }
    
    public function store(Request $request)
    {
        // Validação

        Log::info('Início do cadastro de um novo usuário', ['email' => $request->email]);


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
        User::create(attributes: [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'num_matricula' => $validated['num_matricula'],
            'serie' => $validated['serie'],
            'turno' => $validated['turno'],
            'telefone' => $validated['telefone'],
            'endereco' => $validated['endereco'],
        ]);

      
        // Mantém o administrador logado
        $admin = Auth::user(); // Obtém o usuário autenticado (admin)
        
        // Realiza login novamente para manter a sessão
        Auth::login($admin); // Isso garante que o admin ou responsável permaneça logado

        // Redireciona após o cadastro
        return redirect()->route('usuarios.create')->with('success', 'Cadastro realizado com sucesso!');
    }
}