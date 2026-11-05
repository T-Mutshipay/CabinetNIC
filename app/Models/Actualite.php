<?php

namespace App\Models;

use App\Models\Concerns\SupprimeImageUploadee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory, SupprimeImageUploadee;

    protected $fillable = [
        'titre',
        'description',
        'contenu',
        'auteur',
        'image'
    ];

    // Illustration à afficher : le fond uni par défaut et les fichiers absents ne donnent rien de présentable
    public function getVisuelAttribute(): ?string
    {
        $image = $this->image;

        return $image && $image !== 'img/fond.jpg' && is_file(public_path($image)) ? $image : null;
    }
}
