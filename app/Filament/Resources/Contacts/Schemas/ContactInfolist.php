<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Nom'),
                TextEntry::make('user.email')
                    ->label('Email')
                    ->copyable(),
                TextEntry::make('created_at')
                    ->label('Reçu le')
                    ->dateTime('d/m/Y à H:i'),
                IconEntry::make('traite')
                    ->label('Traité')
                    ->boolean(),
                // Texte saisi par un visiteur : il reste échappé, seuls les retours à la ligne sont conservés
                TextEntry::make('contenu')
                    ->label('Message')
                    ->formatStateUsing(fn (string $state): HtmlString => new HtmlString(nl2br(e($state))))
                    ->columnSpanFull(),
            ]);
    }
}
