<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Supprime du disque l'image envoyée depuis l'administration quand elle est remplacée ou que la fiche est supprimée.
 */
trait SupprimeImageUploadee
{
    protected static function bootSupprimeImageUploadee(): void
    {
        static::updated(function (Model $model) {
            if ($model->wasChanged('image')) {
                static::supprimerImageUploadee($model->getOriginal('image'));
            }
        });

        static::deleted(fn (Model $model) => static::supprimerImageUploadee($model->image));
    }

    // Les images d'origine (img/fond.jpg, photo du fondateur…) servent à plusieurs pages et ne sont jamais supprimées
    protected static function supprimerImageUploadee(?string $chemin): void
    {
        if ($chemin && str_starts_with($chemin, config('cabinet.images_uploads') . '/')) {
            Storage::disk('site')->delete($chemin);
        }
    }
}
