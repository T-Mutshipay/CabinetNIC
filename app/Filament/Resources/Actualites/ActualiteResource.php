<?php

namespace App\Filament\Resources\Actualites;

use App\Filament\Resources\Actualites\Pages\CreateActualite;
use App\Filament\Resources\Actualites\Pages\EditActualite;
use App\Filament\Resources\Actualites\Pages\ListActualites;
use App\Filament\Resources\Actualites\Schemas\ActualiteForm;
use App\Filament\Resources\Actualites\Tables\ActualitesTable;
use App\Models\Actualite;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ActualiteResource extends Resource
{
    protected static ?string $model = Actualite::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static string|UnitEnum|null $navigationGroup = 'Blog';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'actualité';

    protected static ?string $pluralModelLabel = 'actualités';

    protected static ?string $recordTitleAttribute = 'titre';

    public static function form(Schema $schema): Schema
    {
        return ActualiteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActualitesTable::configure($table);
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
            'index' => ListActualites::route('/'),
            'create' => CreateActualite::route('/create'),
            'edit' => EditActualite::route('/{record}/edit'),
        ];
    }
}
