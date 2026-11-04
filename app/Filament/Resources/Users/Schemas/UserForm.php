<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Unique;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(191),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(191)
                    // À la création, l'adresse d'un visiteur qui a commenté reste acceptée (voir CreateUser)
                    ->unique(modifyRuleUsing: fn (Unique $rule, string $operation): Unique => $operation === 'create'
                        ? $rule->whereNotNull('password')
                        : $rule),
                TextInput::make('password')
                    ->label(fn (string $operation): string => $operation === 'create' ? 'Mot de passe' : 'Nouveau mot de passe')
                    ->helperText(fn (string $operation): string => $operation === 'create'
                        ? '12 caractères minimum.'
                        : 'Laissez vide pour garder le mot de passe actuel. 12 caractères minimum.')
                    ->password()
                    ->revealable()
                    ->autocomplete('new-password')
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->minLength(12)
                    ->maxLength(72)
                    ->dehydrated(fn (?string $state): bool => filled($state)),
                TextInput::make('password_confirmation')
                    ->label('Confirmer le mot de passe')
                    ->password()
                    ->revealable()
                    ->autocomplete('new-password')
                    ->requiredWith('password')
                    ->same('password')
                    ->dehydrated(false),
            ]);
    }
}
