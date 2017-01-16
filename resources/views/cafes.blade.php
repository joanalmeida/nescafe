@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <ul>
        @foreach ($cafes as $cafe)
          <li>{{ $cafe->nombre }}</li>
          <li><a href="/addCoffe/{{ $cafe->id }}">Agregar</a></li>
        @endforeach
        </ul>
      </div
    </div>
  </div>
@endsection
