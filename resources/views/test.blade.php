@extends('layouts.app')

@section('content')
  <div class="container" id="details">
    <div class="row">
      <div class="col-md-9 col-md-offset-1">
        <detalles list="{{ $detalles }}"></detalles>
      </div>
      <div class="col-md-2">
        <cart></cart>
      </div>
    </div>
  </div>

  <template id="cart-template">
    <div>
      <span class="glyphicon glyphicon-shopping-cart"></span>
      <span>Tu pedido actual</span>
      <hr>
      <ul class="list-group">
        <li class="list-group-item" v-for="item in items">
          @{{ item.cafe.nombre }} X@{{ item.qty }}
        </li>
      </ul>
      <button class="btn btn-primary" v-on:click="purchase()">Order</button>
    </div>
  </template>

  <template id="detalles-template">
    <h1>Detalles del pedido</h1>

    <div class="col-md-4" v-for="detalle in list">
      <div class="thumbnail">
        <img :src="detalle.cafe.foto">
        <div class="caption">
          <h4>@{{ detalle.cafe.nombre }}</h4>
          <span>X @{{ detalle.cantidad }}</span>
          <p>@{{ detalle.cafe.info }}</p>
          <p>
            <div class="col-xs-4">
              <input class="form-control" v-model="detalle.qty">
            </div>
            <button type="button" class="btn btn-default btn-xs" v-on:click="add(detalle)">
              <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
            <button type="button" class="btn btn-default btn-xs" v-on:click="substract(detalle)">
              <span class="glyphicon glyphicon-chevron-down"></span>
            </button>
            <button class="btn btn-primary" v-on:click="addToCart(detalle)">Add</button>
          </p>
        </div>
      </div>
    </div>
  </template>
@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
  <script src="{{ URL::asset('js/vueTest.js')}}"></script>
@endsection
