<?php

namespace App\Mail;

use App\Models\Commentaire;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

/**
 * Prévient le cabinet d'un nouveau message de contact ou d'un commentaire d'article à modérer.
 */
class NouveauMessage extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Commentaire $commentaire)
    {
    }

    public function envelope(): Envelope
    {
        $auteur = $this->commentaire->user;

        return new Envelope(
            // « Répondre » dans la messagerie répond directement au visiteur
            replyTo: [new Address($auteur->email, $auteur->name)],
            subject: $this->commentaire->actualite
                ? 'Commentaire à valider : ' . $this->commentaire->actualite->titre
                : 'Nouveau message de contact de ' . $auteur->name,
        );
    }

    public function content(): Content
    {
        // Liens signés : impossibles à deviner ou à modifier, valables 30 jours
        $lien = fn (string $action) => URL::temporarySignedRoute(
            "moderation.$action", now()->addDays(30), ['commentaire' => $this->commentaire]
        );

        return new Content(
            view: 'emails.nouveau-message',
            with: [
                'lienPublier'   => $this->commentaire->actualite ? $lien('publier') : null,
                'lienSupprimer' => $this->commentaire->actualite ? $lien('supprimer') : null,
            ],
        );
    }
}
