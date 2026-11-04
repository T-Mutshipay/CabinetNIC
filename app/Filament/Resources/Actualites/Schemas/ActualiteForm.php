<?php

namespace App\Filament\Resources\Actualites\Schemas;

use App\Filament\Components\ImageUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActualiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titre')
                    ->label('Titre')
                    ->required()
                    ->maxLength(191)
                    ->columnSpanFull(),
                TextInput::make('description')
                    ->label('Résumé')
                    ->helperText('Affiché sur les cartes et dans les résultats de recherche.')
                    ->required()
                    ->maxLength(191)
                    ->columnSpanFull(),
                ImageUpload::make('actualites', 'Image')
                    ->columnSpanFull(),
                // Texte brut : l'article public l'affiche échappé, avec ses retours à la ligne
                Textarea::make('contenu')
                    ->label('Contenu')
                    ->required()
                    ->maxLength(60000)
                    ->rows(16)
                    ->columnSpanFull(),
            ]);
    }
}
