<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Função de autenticação
    public function authenticate(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Verificar as credenciais para o admin
        $adminCredentials = [
            'email' => 'admin.biblioteca@et.edu.br',
            'password' => '@Admin2024et',
        ];

        // Verifica se as credenciais fornecidas são válidas
        if ($request->email == $adminCredentials['email'] && $request->password == $adminCredentials['password']) {
            // Autenticar o usuário (sessão do admin)
            Auth::loginUsingId(1); // Assume que o admin tem o ID 1, caso queira utilizar um usuário de banco de dados
            return redirect()->route('pages.livros.administrador.biblioteca');
        }

        // Caso as credenciais não sejam válidas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas são inválidas.',
        ])->withInput();
    }

    // Função para logout (se necessário)
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
