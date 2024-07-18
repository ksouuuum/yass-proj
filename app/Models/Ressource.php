<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ressource extends Model
{
    use HasFactory; 
    
    // Mse en place des relation 1:n entre user et ressource     
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Mse en place des relation 1:n entre commentaire  et ressource, les commentaires seront triés par created_at desc
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class)->orderBy('created_at', 'desc');
    }
    
    // Mse en place des relation 1:n entre ressource et catalogue
    public function catalogue(): BelongsTo
    {
        return $this->belongsTo(Catalogue::class);
    }

}
