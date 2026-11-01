<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'actualite_id', 
        'user_id', 
        'contenu'
    ];

    // « valide » n'est volontairement pas fillable : seul le lien de modération peut publier un commentaire
    protected $casts = [
        'valide' => 'boolean',
    ];

    public function scopeValides($query)
    {
        return $query->where('valide', true);
    }

    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

