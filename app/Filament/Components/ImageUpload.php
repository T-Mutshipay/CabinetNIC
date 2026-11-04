<?php

namespace App\Filament\Components;

use Filament\Forms\Components\FileUpload;

/**
 * Champ image commun aux fiches : le fichier est enregistré dans public/, là où les vues l'attendent via asset().
 */
class ImageUpload
{
    public static function make(string $dossier, string $label = 'Photo'): FileUpload
    {
        return FileUpload::make('image')
            ->label($label)
            ->disk('site')
            ->directory(config('cabinet.images_uploads') . '/' . $dossier)
            ->visibility('public')
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->maxSize(2048)
            ->helperText('JPEG, PNG ou WebP, 2 Mo maximum.')
            ->required();
    }
}
