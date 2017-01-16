@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Pedidos</h1>
    <div id="app">
      @{{ message }}
    </div>

    <div>Pedido Nro: <span>{{ $pedido->id }}</span></div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        @foreach ($pedido->detalles as $det)
          <div class="col-md-4">
            <img src="{{ $det->cafe->foto }}">
            <span>{{ $det->cafe->nombre }}</span>
            <span>x {{ $det->cantidad() }}</span>
            <input id="cafe-{{ $det->cafe->id }}" value="1">
            <span class="glyphicon glyphicon-chevron-up" onclick="changeQuantity(1, {{ $det->cafe->id }})"></span>
            <span class="glyphicon glyphicon-chevron-down" onclick="changeQuantity(-1, {{ $det->cafe->id }})"></span>
            <button onclick="addOrder({{ $det->cafe->id }})">Add</button>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('js/pedidos.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
  <script>
      new Vue({
        el: '#app',
        data: {
          message: 'Hello Vue.js!'
        }
      });
  </script>
@endsection
