<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detalle_Pedido;
use App\Cafe;

class DetallePedidoController extends Controller
{
    //
    public function show(Detalle_Pedido $detalle) {
        return $detalle->descripcion;
    }
}
