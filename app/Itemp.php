<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemp extends Model
{
    //
    protected $table = "itensp";
    protected $fillable = [
        'pedidos_id','itens_id','quantidade','preco',
    ];
    public function Item(){
        //lado n
        return $this->hasMany(Item::class);
    }
}
