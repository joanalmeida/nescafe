<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    //
    protected $table = "descripcion";

    public function detalle_pedido() {
        return $this->belongsTo('App\Detalle_Pedido');
    }
}
