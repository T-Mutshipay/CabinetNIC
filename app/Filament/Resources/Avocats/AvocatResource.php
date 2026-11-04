<?php

namespace App\Filament\Resources\Avocats;

use App\Filament\Resources\Avocats\Pages\CreateAvocat;
use App\Filament\Resources\Avocats\Pages\EditAvocat;
use App\Filament\Resources\Avocats\Pages\ListAvocats;
use App\Filament\Resources\Avocats\Schemas\AvocatForm;
use App\Filament\Resources\Avocats\Tables\AvocatsTable;
use App\Models\Avocat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AvocatResource extends Resource
{
    protected static ?string $model = Avocat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedScale;

    protected static string|UnitEnum|null $navigationGroup = 'Cabinet';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'avocat';

    protected static ?string $pluralModelLabel = 'avocats';

    protected static ?string $recordTitleAttribute = 'nom_complet';

    public static function form(Schema $schema): Schema
    {
        return AvocatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AvocatsTable::configure($table);
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
            'index' => ListAvocats::route('/'),
            'create' => CreateAvocat::route('/create'),
            'edit' => EditAvocat::route('/{record}/edit'),
        ];
    }
}
