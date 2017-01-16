<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Detalle_Pedido;
use App\Descripcion;
use App\Pedido;
use Auth;

class DescripcionPedidoController extends Controller
{
    //
    //Falta agregar la cantidad por parametro
    public function add1($id_cafe) {
      $user = Auth::user();
      $detalle = Detalle_Pedido::where('id_cafe', $id_cafe)->first();
      if(empty($detalle)) {
        $detalle = new Detalle_Pedido;
        $detalle->id_cafe = $id_cafe;
        $detalle->id_pedido = 2;//Pedido Actual
        $detalle->save();
      }
      //$id = $detalle->id;
      $des = new Descripcion;
      $des->id_persona = $user->id;
      $des->id_detalle = $detalle->id;
      //Descomentar cuando agregue la cantidad por parametro
      //$des->cantidad = $cantidad;
      $des->cantidad = 2;
      $des->save();
      return view('pedidos');
    }

    //public function add(Request $request) {
    public function add_order($item) {
      //$qty = $request->input("qty");
      //$id_cafe = $request->input("id");

      $qty = $item->qty;
      $id_cafe = $item->cafe->id;

      $user = Auth::user();
      $detalle = Detalle_Pedido::where('id_cafe', $id_cafe)->first();
      if(empty($detalle)) {
        $detalle = new Detalle_Pedido;
        $detalle->id_cafe = $id_cafe;
        $detalle->id_pedido = Pedido::where('activo', 1)->first()->id;//2;Pedido Actual
        $detalle->save();
      }
      $des = Descripcion::where('id_persona', $user->id)->where('id_detalle', $detalle->id)->first();
      if(empty($des)) {
        $des = new Descripcion;
        $des->id_persona = $user->id;
        $des->id_detalle = $detalle->id;
        $des->cantidad = $qty;
      } else {
        $des->cantidad += $qty;
      }
      $des->save();

      //What should i return??!
      //return $des->cantidad;
      return $detalle->cantidad();

      //return $request->input("qty");
      //return "Ok";
    }

    public function add_for_cart(Request $request) {
      $items = $request->input("items");
      /*
      foreach ($items as $item) {
        $this->add_order($item);
      }
      */

      //return "Ok";
    }

    public function test(){
      return view('home');
    }
}
