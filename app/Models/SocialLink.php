<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'avocat_id',
        'plateforme',
        'url',
    ];
    public function avocat()
    {
        return $this->belongsTo(Avocat::class);
    }
}

