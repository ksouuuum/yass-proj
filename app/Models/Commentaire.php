<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Commentaire extends Model
{
    use HasFactory;

// Mse en place des relation 1:n entre commentaire  et ressource     
public function ressource(): BelongsTo
{
    return $this->belongsTo(Ressource::class);
}

// Mse en place des relation 1:n entre user et commentaire     
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

}
