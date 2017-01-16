<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('pedidos', [
  'middleware' => 'auth',
  'uses' => 'PedidosController@index'
]);

//Route::get('/addCoffee/{cafe}', 'DescripcionPedidoController@add');
//Route::get('/test/{t}', 'DescripcionPedidoController@test');

//Route::get('addCoffee', 'DescripcionPedidoController@add');

Route::post('addCoffee', 'DescripcionPedidoController@add_for_cart');

Route::get('detalles/{detalle}', 'DetallePedidoController@show');

Route::get('cafes', 'CafeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
