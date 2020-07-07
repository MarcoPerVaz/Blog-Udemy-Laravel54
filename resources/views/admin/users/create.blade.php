
@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos personales</h3>
                </div>
                <div class="box-body">
                   
                    @include('partials.error-messages')

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

                            @include('admin.permissions.checkboxes', ['model' => $user])
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
      | --------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@include('partials.error-messages') Incluye la vista resources\views\partials\error-messages.blade.php
      | *@include('admin.permissions.checkboxes', ['model' => $user]) Incluye la vista resources\views\admin\permissions\checkboxes.blade.php y le pasa la variable 'model'
      | --------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}