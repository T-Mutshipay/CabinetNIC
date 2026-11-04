<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * « password » est requis par make:filament-user. Le formulaire public n'envoie que le nom et l'email :
     * il ne doit jamais passer les données de la requête telles quelles à ce modèle.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Les visiteurs qui commentent n'ont pas de mot de passe : seuls les comptes d'administration en ont un
    public function canAccessPanel(Panel $panel): bool
    {
        return filled($this->password);
    }

    public function scopeComptes($query)
    {
        return $query->whereNotNull('password');
    }
}
