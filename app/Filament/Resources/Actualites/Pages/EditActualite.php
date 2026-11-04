<?php

namespace App\Filament\Resources\Actualites\Pages;

use App\Filament\Resources\Actualites\ActualiteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditActualite extends EditRecord
{
    protected static string $resource = ActualiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
