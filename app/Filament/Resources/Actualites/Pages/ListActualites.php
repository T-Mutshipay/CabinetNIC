<?php

namespace App\Filament\Resources\Actualites\Pages;

use App\Filament\Resources\Actualites\ActualiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActualites extends ListRecords
{
    protected static string $resource = ActualiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
