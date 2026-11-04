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
    protected $casts = [
        'valide' => 'boolean',
        'traite' => 'boolean',
    ];

    public function scopeValides($query)
    {
        return $query->where('valide', true);
    }

    // Les messages du formulaire de contact sont les lignes sans article
    public function scopeContacts($query)
    {
        return $query->whereNull('actualite_id');
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

