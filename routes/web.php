<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Produtos
Route::get('/produtos', function () {
    return view('components.sections.products');
})->name('products.index');


Route::get('/carrinho', function () {
 
    return view('components.cart'); 
})->name('cart');

Route::post('/agendar', [AppointmentController::class, 'store'])->name('appointments.store');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';