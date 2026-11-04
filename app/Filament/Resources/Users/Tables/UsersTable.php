<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                // Pas de suppression : elle effacerait aussi les commentaires de la personne
                Action::make('retirerAcces')
                    ->label("Retirer l'accès")
                    ->icon(Heroicon::OutlinedNoSymbol)
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalDescription('Cette personne ne pourra plus se connecter. Ses commentaires sont conservés.')
                    ->hidden(fn (User $record): bool => $record->is(auth()->user()))
                    ->successNotificationTitle('Accès retiré')
                    ->action(function (User $record, Action $action): void {
                        $record->forceFill(['password' => null, 'remember_token' => null])->save();
                        $action->success();
                    }),
            ]);
    }
}
