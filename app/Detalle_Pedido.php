<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model
{
    //
    protected $table = 'detalle_pedidos';

    public function cafe() {
        return $this->belongsTo('App\Cafe', 'id_cafe');
    }

    public function descripcion() {
        return $this->hasMany('App\Descripcion', 'id_detalle');
    }

    public function cantidad() {
        $descripcion = $this->descripcion->all();
        $cantidad = 0;
        foreach ($descripcion as $des) {
            $cantidad += $des->cantidad;
        }
        return $cantidad;
    }
}
