
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
                    {{-- validation errors --}}
                    @endif

                    <form action="{{ route('admin.users.store') }}" method="post">
                    {{ csrf_field() }}
                    {{-- name --}}
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    {{-- name --}}

                    {{-- email --}}
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    {{-- email --}}

                    {{-- roles --}}
                        <div class="form-group col-md-6">
                            <label>Roles</label>
                            @include('admin.roles.checkboxes')
                        </div>
                    {{-- end roles --}}

                    {{-- permissions --}}
                        <div class="form-group col-md-6">
                            <label>Permisos</label>
                            @include('admin.permissions.checkboxes')
                        </div>
                    {{-- end permissions --}}

                    {{-- password --}}
                        <span class="help-block">*La contraseña será generada y enviada al nuevo usuario vía email</span>
                    {{-- end password --}}

                    <button class="btn btn-primary btn-block">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Notas:
      | --------------------------------------------------------------------------------------------------------------------
      | *@if ( $errors->any() ) Verifica si existen errores de validación en los campos input html y los muestra en la vista
      | *El helper route() permite usar rutas con nombre y se definen en routes\web.php
      | * csrf_field() Protección contra ataques csrf
      |     *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
      | *old() Permite que la información de los campos input no se borre al refrescar la página
      | *@include('admin.roles.checkboxes') Incluye la vista resources\views\admin\roles\checkboxes.blade.php
      | *@include('admin.permissions.checkboxes') Incluye la vista resources\views\admin\permissions\checkboxes.blade.php
      | --------------------------------------------------------------------------------------------------------------------
--}}