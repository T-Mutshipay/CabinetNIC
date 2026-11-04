<?php

namespace App\Filament\Resources\Avocats\Pages;

use App\Filament\Resources\Avocats\AvocatResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAvocat extends EditRecord
{
    protected static string $resource = AvocatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
