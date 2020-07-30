<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $fillable = [
        'descritivo',
    ];
    public function Item(){
        //lado n
        return $this->hasMany(Item::class, 'categorias_id');

    }
}
