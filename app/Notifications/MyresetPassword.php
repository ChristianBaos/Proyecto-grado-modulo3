<?php

namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
class MyResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {   return (new MailMessage)
        
        ->subject('Recuperar contraseña')
        ->greeting('Hola'.$notifiable->name)
        ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta de usuario en Parqueadero Vida.web.')
        ->action('Recuperar contraseña', route('password.reset', $this->token))
        ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
        ->salutation('Saludos, '. config('app.name'));

    }
}