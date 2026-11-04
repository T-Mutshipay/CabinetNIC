<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactActions;
use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    public function getTitle(): string
    {
        return 'Message de ' . $this->getRecord()->user->name;
    }

    protected function getHeaderActions(): array
    {
        return [
            ContactActions::repondre(),
            ContactActions::basculerTraite(),
            DeleteAction::make(),
        ];
    }
}
