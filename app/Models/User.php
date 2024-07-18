<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Mse en place des relation 1:n entre user et ressource 
    public function ressources(): HasMany
    {
        return $this->hasMany(Ressource::class);
    }

    // Mse en place des relation 1:n entre user et commentaires 
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    } 
    
    // Mse en place des relation 1:n entre user  et groupe
    public function groupe(): BelongsTo 
    {
        return $this->belongsTo(Groupe::class);
    }
}
