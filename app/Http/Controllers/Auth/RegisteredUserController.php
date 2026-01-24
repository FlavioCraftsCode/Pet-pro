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
    /**
     * Exibe a tela de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Processa o registro, loga o usuário e o mantém no site.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // Telefone removido daqui para evitar erro de validação
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Telefone removido daqui para não dar erro no SQL (QueryException)
            'role' => 'customer', 
        ]);

        // Dispara o envio do código de 6 dígitos via Notificação
        event(new Registered($user));

        // LOGA O USUÁRIO IMEDIATAMENTE (Essencial para UX de e-commerce)
        Auth::login($user);

        /**
         * REDIRECIONA PARA A HOME
         * Isso garante que após o registro o usuário veja o site principal 
         * com o nome dele já aparecendo no Header.
         */
        return redirect()->route('home')->with('status', 'Bem-vindo! Enviamos um código de ativação para seu e-mail para validar sua conta.');
    }
}