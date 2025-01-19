<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica o usuário
        $request->authenticate();

        // Regenera a sessão do usuário
        $request->session()->regenerate();

        // Redireciona para a página da biblioteca após o login
        return redirect()->route('biblioteca');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Realiza o logout do usuário
        Auth::guard('web')->logout();

        // Invalida a sessão
        $request->session()->invalidate();

        // Regenera o token da sessão
        $request->session()->regenerateToken();

        // Redireciona para a página inicial
        return redirect('/');
    }
}
