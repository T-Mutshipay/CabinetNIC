<?php

namespace App\Filament\Resources\Avocats\Pages;

use App\Filament\Resources\Avocats\AvocatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAvocats extends ListRecords
{
    protected static string $resource = AvocatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
