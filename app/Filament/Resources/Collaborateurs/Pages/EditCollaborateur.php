<?php

namespace App\Filament\Resources\Collaborateurs\Pages;

use App\Filament\Resources\Collaborateurs\CollaborateurResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCollaborateur extends EditRecord
{
    protected static string $resource = CollaborateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
