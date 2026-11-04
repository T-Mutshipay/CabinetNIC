<?php

namespace App\Filament\Resources\Avocats\Schemas;

use App\Filament\Components\ImageUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AvocatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom_complet')
                    ->label('Nom complet')
                    ->required()
                    ->maxLength(191),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique()
                    ->maxLength(191),
                TextInput::make('role')
                    ->label('Rôle')
                    ->placeholder('Avocat, Avocate, Avocat Fondateur…')
                    ->maxLength(191),
                ImageUpload::make('avocats'),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(6)
                    ->columnSpanFull(),
                Repeater::make('social_links')
                    ->label('Réseaux sociaux')
                    ->relationship()
                    ->schema([
                        // Texte libre : la fiche publique affiche une icône pour Facebook, X et LinkedIn, une initiale sinon
                        TextInput::make('plateforme')
                            ->label('Plateforme')
                            ->datalist(['Facebook', 'LinkedIn', 'X', 'Instagram'])
                            ->required()
                            ->maxLength(191),
                        TextInput::make('url')
                            ->label('Lien')
                            ->url()
                            ->required()
                            ->maxLength(191),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Ajouter un réseau')
                    ->columnSpanFull(),
            ]);
    }
}
