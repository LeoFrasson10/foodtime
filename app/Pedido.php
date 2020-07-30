<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'users_id','data','hora', 'status',
    ];
    public function Usuario(){
        //lado n
        return $this->belongTo(Usuario::class);
    }
}
