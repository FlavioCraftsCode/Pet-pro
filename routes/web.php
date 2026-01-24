<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - PetPro Professional System
|--------------------------------------------------------------------------
| Aqui as rotas são organizadas por níveis de acesso, garantindo que o 
| usuário Flavio navegue no site mesmo sem o e-mail verificado.
*/

// --- 1. ROTAS TOTALMENTE PÚBLICAS ---
// A Home e o Blog são o "cartão de visitas". Não podem ter bloqueios.
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Processamento de Agendamentos (Pode ser público ou logado)
Route::post('/agendar', [AppointmentController::class, 'store'])->name('appointments.store');


// --- 2. ÁREA RESTRITA (Exige Login + E-mail Verificado) ---
// O Middleware 'verified' aqui garante que só quem digitou o código de 6 dígitos
// acesse o painel de controle e a finalização de compra.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
});


// --- 3. GESTÃO DE CONTA (Exige APENAS Login) ---
// Essencial para o e-commerce: o usuário pode editar seu perfil ou trocar a 
// senha sem necessariamente ter verificado o e-mail ainda.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- 4. AUTENTICAÇÃO (Breeze) ---
// Importamos por último para que nossas rotas personalizadas (como a Home)
// tenham prioridade total sobre as rotas padrão do pacote.
require __DIR__.'/auth.php';