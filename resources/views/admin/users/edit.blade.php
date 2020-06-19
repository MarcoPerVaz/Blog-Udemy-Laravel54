
@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Datos personales</h3>
      </div>
      <div class="box-body">
        @if ( $errors->any() )
        {{-- validation errors --}}
          <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>  
            @endforeach
          </ul>
        {{-- end validation errors --}}
        @endif
        <form action="{{ route('admin.users.update', $user) }}" method="post">
          {{ csrf_field() }} {{ method_field('PUT') }}

          {{-- name --}}
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>
          {{-- end name --}}

          {{-- email --}}
            <div class="form-group">
              <label for="email">Email:</label>
              <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>
          {{-- end email --}}

          <button class="btn btn-primary btn-block">Actualizar usuario</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


{{-- Notas:
        | --------------------
        | *@extends('admin.layout') Extiende de la vista resources\views\admin\layout.blade.php
        | *@section('content') Asocia el contenido de esta vista con la directiva @yield() de la vista resources\views\admin\layout.blade.php línea 282
        | *@if ( $errors->any() ) Verifica si hay errores de validación y si hay los muestra en la vista
        | *El helper route() permite usar rutas con nombre y se definen en routes\web.php
        | *csrf_field() Ofrece protección contra ataques csrf
        |   *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
        | *method_field('PUT' Los navegadores actuales no permiten usar el método httpm 'PUT' pero Laravel ofrece la posibilidad de usarlo en las rutas
        |   *Más información en https://laravel.com/docs/5.5/controllers#resource-controllers
        | * old() permite que el input html recuerde la información al recargar la página o regresar de otra
        | --------------------
--}}