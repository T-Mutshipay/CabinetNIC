<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // L'adresse a peut-être déjà servi à commenter : ce compte reçoit alors l'accès, sans créer de doublon
    protected function handleRecordCreation(array $data): Model
    {
        $user = User::firstOrNew(['email' => $data['email']]);
        $user->fill($data)->save();

        return $user;
    }
}
