
@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Role</h3>
            </div>
            <div class="box-body">

                @include('partials.error-messages')

                <form action="{{ route('admin.roles.store') }}" method="post">
                  {{ csrf_field() }}

                  {{-- name --}}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                  {{-- end name --}}

                  {{-- guard --}}
                    <div class="form-group">
                        <label for="email">Guard:</label>
                        <select name="guard_name" class="form-control">
                          @foreach (config('auth.guards') as $guardName => $guard)
                              <option {{ old('guard_name') === $guardName ? 'selected' : '' }} 
                              value="{{ $guardName }}">{{ $guardName }}</option>
                          @endforeach
                        </select>
                    </div>
                  {{-- end guard --}}

                  {{-- permissions --}}
                    <div class="form-group col-md-6">
                        <label>Permisos</label>

                        @include('admin.permissions.checkboxes', ['model' => $role])
                        
                    </div>
                  {{-- end permissions --}}

                  <button class="btn btn-primary btn-block">Crear role</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection


{{-- Notas:
      | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@extends('admin.layout') Extiende de la vista resources\views\admin\layout.blade.php
      | *@section('content') Asocia el contenido con la directiva @yield('content') de la vista resources\views\admin\layout.blade.php
      | *@include('partials.error-messages') Incluye la vista resources\views\partials\error-messages.blade.php
      | *El helper route() permite usar las rutas con nombre y se definen en routes\web.php
      | *csrf_field() Ofrece protección contra ataques csrf
      |   *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
      | *old() Permite que no se pierda la información introducida por el usuario en caso de actualizar o regresar a la página
      | *@foreach (config('auth.guards') as $guardName => $guard) Recorre los guards que Laravel tiene por defecto (Api y Web) y se obtienen desde el archivo config\auth.php
      |   *config('auth.guards')
      |     *Dónde config se encuentra en 'config'
      |     *Dónde auth se encuentra en 'config\auth.php'
      |     *guards Es el 'guards' => [] dentro de 'config\auth.php'
      | *$guardName => $guard Obtiene todo del guard ($guard) pero se obtiene el nombre del guard ($guardName)
      | *old('guard_name') === $guardName ? 'selected' : '' Para mantener el guard seleccionado en caso de que la validación falle
      | *@include('admin.permissions.checkboxes', ['model' => $role]) Incluye la vista resources\views\admin\roles\checkboxes.blade.php y le pasa la variable 'model'
      | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}