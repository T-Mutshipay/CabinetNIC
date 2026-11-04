<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function afterSave(): void
    {
        // Sans cela, changer son propre mot de passe déconnecterait aussitôt
        if ($this->record->is(auth()->user()) && $this->record->wasChanged('password')) {
            session()->put('password_hash_' . Filament::getAuthGuard(), $this->record->getAuthPassword());
        }

        $this->data['password'] = null;
        $this->data['password_confirmation'] = null;
    }
}
