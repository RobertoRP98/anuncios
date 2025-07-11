<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = ['name','slug'];

    public function municipios(){
        return $this->hasMany(Municipio::class);
    }

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
