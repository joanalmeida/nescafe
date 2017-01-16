<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Pedido;
use App\Detalle_Pedido;

class PedidosController extends Controller
{
    //
    public function index(Request $request)
    {
        //Agarro el primer pedido que este activo (deberia ser el unico, pero por las dudas)
        //$pedido = Pedido::where('activo', 1)->first();

        $pedido_activo = Pedido::where('activo', 1)->first();
        $detalles = Detalle_Pedido::where('id_pedido', $pedido_activo->id)->with('cafe')->get();

        foreach ($detalles as $det) {
          $det->cantidad = $det->cantidad();
          $det->qty = 1;
        }
        //$detalles = Pedido::where('activo', 1)->first()->detalles()->get();

        //return view('pedidos', compact('pedido'));
        return view('test', compact('detalles'));
        //return var_dump($pedido);
    }
}
