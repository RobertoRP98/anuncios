<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = ['name','slug','state_id'];

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }

     public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
