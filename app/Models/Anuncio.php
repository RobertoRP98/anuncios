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

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

      public function category()
    {
        return $this->belongsTo(Category::class);
    }

      public function state()
    {
        return $this->belongsTo(State::class);
    }

      public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
