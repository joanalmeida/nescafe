<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $table = 'pedidos';

    public function detalles() {
        return $this->hasMany('App\Detalle_Pedido', 'id_pedido');
    }
}
