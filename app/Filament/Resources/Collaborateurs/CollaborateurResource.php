<?php

namespace App\Filament\Resources\Collaborateurs;

use App\Filament\Resources\Collaborateurs\Pages\CreateCollaborateur;
use App\Filament\Resources\Collaborateurs\Pages\EditCollaborateur;
use App\Filament\Resources\Collaborateurs\Pages\ListCollaborateurs;
use App\Filament\Resources\Collaborateurs\Schemas\CollaborateurForm;
use App\Filament\Resources\Collaborateurs\Tables\CollaborateursTable;
use App\Models\Collaborateur;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CollaborateurResource extends Resource
{
    protected static ?string $model = Collaborateur::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|UnitEnum|null $navigationGroup = 'Cabinet';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'collaborateur';

    protected static ?string $pluralModelLabel = 'collaborateurs';

    protected static ?string $recordTitleAttribute = 'nom_complet';

    public static function form(Schema $schema): Schema
    {
        return CollaborateurForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CollaborateursTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCollaborateurs::route('/'),
            'create' => CreateCollaborateur::route('/create'),
            'edit' => EditCollaborateur::route('/{record}/edit'),
        ];
    }
}
