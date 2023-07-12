<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoRegistro extends Notification
{
    use Queueable;

    public $id_registro;
    public $numero_documento;
    public $usuario_id;
    public $nombre_usuario;
    /**
     * Create a new notification instance.
     */
    public function __construct($numero_documento, $usuario_id, $nombre_usuario)
    {
        $this->numero_documento = $numero_documento;
        $this->usuario_id = $usuario_id;
        $this->nombre_usuario = $nombre_usuario;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

    //Almacena en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'numero_documento' => $this->numero_documento,
            'usuario_id' => $this->usuario_id,
            'nombre_usuario' => $this->nombre_usuario,
        ];
    }
}
