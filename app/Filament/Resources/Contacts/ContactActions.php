<?php

namespace App\Filament\Resources\Contacts;

use App\Models\Commentaire;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;

/**
 * Actions communes à la liste et à la fiche d'un contact.
 */
class ContactActions
{
    public static function repondre(): Action
    {
        return Action::make('repondre')
            ->label('Répondre')
            ->icon(Heroicon::OutlinedPaperAirplane)
            ->url(fn (Commentaire $record): string => 'mailto:' . $record->user->email
                . '?subject=' . rawurlencode('Votre message au cabinet ' . config('cabinet.name')));
    }

    public static function basculerTraite(): Action
    {
        return Action::make('basculerTraite')
            ->label(fn (Commentaire $record): string => $record->traite ? 'Remettre à traiter' : 'Marquer comme traité')
            ->icon(fn (Commentaire $record): Heroicon => $record->traite ? Heroicon::OutlinedArrowUturnLeft : Heroicon::OutlinedCheck)
            ->color(fn (Commentaire $record): string => $record->traite ? 'gray' : 'success')
            ->action(function (Commentaire $record, $livewire): void {
                $record->forceFill(['traite' => ! $record->traite])->save();

                // Met à jour le compteur du menu sans recharger la page
                $livewire->dispatch('refresh-sidebar');
            });
    }
}
