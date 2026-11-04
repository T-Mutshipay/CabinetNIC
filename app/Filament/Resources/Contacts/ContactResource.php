<?php

namespace App\Filament\Resources\Contacts;

use App\Filament\Resources\Contacts\Pages\ListContacts;
use App\Filament\Resources\Contacts\Pages\ViewContact;
use App\Filament\Resources\Contacts\Schemas\ContactInfolist;
use App\Filament\Resources\Contacts\Tables\ContactsTable;
use App\Models\Commentaire;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

/**
 * Messages reçus par le formulaire de contact : ce sont des commentaires sans article.
 */
class ContactResource extends Resource
{
    protected static ?string $model = Commentaire::class;

    protected static ?string $slug = 'contacts';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static string|UnitEnum|null $navigationGroup = 'Cabinet';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'contact';

    protected static ?string $pluralModelLabel = 'contacts';

    // Toutes les pages passent par cette requête : un commentaire d'article n'est jamais accessible ici
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->contacts()->with('user');
    }

    public static function getRecordTitle(?Model $record): string|Htmlable|null
    {
        return $record?->user?->name;
    }

    public static function getNavigationBadge(): ?string
    {
        $aTraiter = Commentaire::contacts()->where('traite', false)->count();

        return $aTraiter > 0 ? (string) $aTraiter : null;
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Messages à traiter';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContactInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContacts::route('/'),
            'view' => ViewContact::route('/{record}'),
        ];
    }
}
