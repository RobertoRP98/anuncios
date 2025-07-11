<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'category_id',
        'state_id',
        'municipio_id',
        'is_premium',
        'premium_level',
        'starts_at',
        'ends_at',
        'is_active'
    ];
}
