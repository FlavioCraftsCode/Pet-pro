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
     * Exibe a tela de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Lida com a tentativa de login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        /**
         * AJUSTE DE ELITE:
         * Em vez de redirecionar para o 'dashboard', enviamos o usuário para a 'home'.
         * Isso garante que ele continue no site e veja o Header atualizado.
         */
        return redirect()->route('home');
    }

    /**
     * Finaliza a sessão (Logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Após sair, volta para a home
        return redirect()->route('home');
    }
}