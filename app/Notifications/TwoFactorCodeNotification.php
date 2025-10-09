<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class TwoFactorCodeNotification extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Código de verificación Biblioteca') // Título del correo
        ->greeting('Hola ' . $notifiable->name . '.') // Saludo personalizado
        ->line('Tu código para acceder a la aplicación es: ')
        ->line($notifiable->two_factor_code)
        //->action('Verificar aquí', route('verify'))
        ->line('Si no solicitaste este código, puedes ignorar este correo.')
        ->line('Tu código expira en 10 minutos.');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
