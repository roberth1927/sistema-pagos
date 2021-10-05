<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyAdmin extends Notification
{
    use Queueable;
    public $GlobalDatos;

  
    public function __construct(Array $datos)
    {
        $this->GlobalDatos=$datos;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable){
        return[
              'datos' => $this->GlobalDatos  
        ];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

   
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
