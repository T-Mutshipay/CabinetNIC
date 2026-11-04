<?php

namespace App\Filament\Resources\Contacts\Tables;

use App\Filament\Resources\Contacts\ContactActions;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('contenu')
                    ->label('Message')
                    ->searchable()
                    ->limit(35),
                TextColumn::make('created_at')
                    ->label('Reçu le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                IconColumn::make('traite')
                    ->label('Traité')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('traite')
                    ->label('Traité'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    ContactActions::repondre(),
                    ContactActions::basculerTraite(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->after(fn ($livewire) => $livewire->dispatch('refresh-sidebar')),
                ]),
            ]);
    }
}
