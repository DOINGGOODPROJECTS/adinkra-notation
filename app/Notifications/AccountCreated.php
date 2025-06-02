<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AccountCreated extends Notification
{
    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre compte a été créé')
            ->greeting('Bonjour,')
            ->line("Un compte a été créé pour vous sur notre plateforme.")
            ->line("**Identifiants de connexion :**")
            ->line("Email : {$this->email}")
            ->line("Mot de passe : {$this->password}")
            ->action('Connexion', url('/login'))
            ->line("Merci de changer votre mot de passe après votre première connexion.");
    }
}
