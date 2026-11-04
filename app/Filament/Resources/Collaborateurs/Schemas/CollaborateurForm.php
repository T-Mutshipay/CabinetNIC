<?php

namespace App\Filament\Resources\Collaborateurs\Schemas;

use App\Filament\Components\ImageUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CollaborateurForm
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
                TextInput::make('post')
                    ->label('Poste')
                    ->required()
                    ->maxLength(191),
                ImageUpload::make('collaborateurs'),
                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}
