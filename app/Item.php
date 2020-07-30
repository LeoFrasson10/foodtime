<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = "itens";
    protected $fillable = [
        'categorias_id','titulo','descritivo','preco','status',
    ];
    public function Categoria(){
        return $this->belongTo(Categoria::class);
    }
    public function Itemp(){
        return $this->hasMany(Itemp::class);
    }
}
