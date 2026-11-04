<?php

namespace App\Models;

use App\Models\Concerns\SupprimeImageUploadee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use HasFactory, SupprimeImageUploadee;

    protected $fillable = [
        'nom_complet',
        'email',
        'post',
        'image',
        'description',
    ];
}
