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
            ->subject('Official Notice – Your Evaluations for the Adinkra Fellowship 2025 Jury Note Officielle – Vos évaluations pour le Jury du Adinkra Fellowship 2025')
            ->greeting('Dear Jury Member, / Bonjour cher membre du jury,')
            ->line("We hope this message finds you well.")
            ->line("Nous espérons que vous allez bien.")
            ->line('')
            ->line("This edition of the Adinkra Fellowship received 1,257 applications — a shared victory!")
            ->line("Cette édition du Adinkra Fellowship a reçu 1 257 candidatures ! C'est une victoire partagée !")
            ->line('')
            ->line("We are pleased to share with you the set of applications assigned to you for evaluation.")
            ->line("Nous avons le plaisir de vous transmettre les dossiers qui vous sont attribués pour évaluation.")
            ->line("Kindly complete your reviews by August 2, 2025, which is a firm deadline.")
            ->line("Nous vous remercions de bien vouloir finaliser vos évaluations d’ici le 2 août 2025, date limite ferme.")
            ->line('')
            ->action('View my evaluations / Voir mes évaluations', 'https://adinkra-notation-production-66bd.up.railway.app/login')
            ->line('')
            ->line("Thank you for your invaluable contribution.")
            ->line("Merci pour votre précieuse contribution.")
            ->line('')
            ->line("Warm regards, / Bien cordialement,")
            ->line("The Adinkra Team / L’équipe Adinkra");
    }
}
