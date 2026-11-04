<?php

namespace App\Filament\Resources\Collaborateurs\Pages;

use App\Filament\Resources\Collaborateurs\CollaborateurResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCollaborateurs extends ListRecords
{
    protected static string $resource = CollaborateurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
