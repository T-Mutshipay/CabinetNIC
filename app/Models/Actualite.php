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
        'image'
    ];
}
