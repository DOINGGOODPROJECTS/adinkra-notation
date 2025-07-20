<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SubmissionsAssigned extends Notification
{
    public $count;
    public $deadline;

    public function __construct($count, $deadline)
    {
        $this->count = $count;
        $this->deadline = $deadline;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelles soumissions à évaluer')
            ->line("Vous avez reçu {$this->count} nouvelles soumissions à évaluer.")
            ->line("Date limite d'évaluation : {$this->deadline}")
            ->action('Voir mes soumissions', 'https://adinkra-notation-production-66bd.up.railway.app/login')
            ->line('Merci pour votre engagement.');
    }
}
