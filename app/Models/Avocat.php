<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avocat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet', 
        'email', 
        'role',
        'description', 
        'image'
    ];
    public function social_links()
    {
        return $this->hasMany(SocialLink::class);
    }
}

