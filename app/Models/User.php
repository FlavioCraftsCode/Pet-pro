<?php

namespace App\Models;

use App\Notifications\VerifyEmailCode; 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atributos preenchíveis.
     * Removido o campo 'phone' para simplificar o cadastro.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Mantemos o role para controle de acesso (admin/customer)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversão de tipos.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * MÉTODO DE ELITE: Sobrescreve o envio padrão de verificação.
     * Envia o código de 6 dígitos formatado para o e-mail.
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailCode());
    }

    /**
     * Helper para verificar se o usuário é administrador.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}