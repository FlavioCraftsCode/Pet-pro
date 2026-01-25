<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Cache; 

class VerifyEmailCode extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        
        $code = rand(100000, 999999);
        
        
        Cache::put("verify_code_{$notifiable->email}", $code, now()->addMinutes(15));

        return (new MailMessage)
            ->subject('Seu Código de Acesso - PetPro')
            ->greeting('Olá, ' . $notifiable->name . '!')
            ->line('Seu código de verificação para criar sua conta é:')
            ->line('**' . $code . '**')
            ->line('Este código expira em 15 minutos.')
            ->line('Se você não solicitou este código, ignore este e-mail.');
    }
}