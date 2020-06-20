
@extends('admin.layout')

@section('content')
<div class="row">
  {{-- first column --}}
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

            {{-- password --}}
              <div class="form-group">
                <label for="password_confirmation">Contraseña:</label>
                <input name="password" type="password" placeholder="Contraseña " class="form-control">
                <span class="help-block">*Dejar en blanco para no cambiar la contraseña</span>
              </div>
            {{-- end password --}}

            {{-- password confirm --}}
              <div class="form-group">
                <label for="password">Repite la contraseña:</label>
                <input name="password_confirmation" type="password" placeholder="Repita la contraseña" class="form-control">
              </div>
            {{-- end password confirm --}}

            <button class="btn btn-primary btn-block">Actualizar usuario</button>
          </form>
        </div>
      </div>
    </div>
  {{-- end first column --}}

  {{-- second column --}}
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Roles y permisos</h3>
        </div>
        <form action="{{ route('admin.users.roles.update', $user) }}" method="post">
          {{ csrf_field() }} {{ method_field('PUT') }}
          <div class="box-body">
            @foreach ($roles as $id => $name)
              <div class="checkbox">
                {{-- roles --}}
                  <label>
                    <input type="checkbox" name="roles[]" value="{{ $name }}" {{ $user->roles->contains($id) ? 'checked' : '' }}>
                    {{ $name }} 
                  </label>
                {{-- end roles --}}
              </div>
            @endforeach
          </div>
          <button class="btn btn-primary btn-block">Actualizar roles</button>
        </form>
      </div>
    </div>
  {{-- end second column --}}
</div>
@endsection


{{-- Notas:
      | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *El helper route() permite usar rutas con nombre y se definen en routes\web.php
      | *csrf_field() Ofrece protección contra ataques csrf
      |   *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
      | *method_field('PUT' Los navegadores actuales no permiten usar el método httpm 'PUT' pero Laravel ofrece la posibilidad de usarlo en las rutas
      |   *Más información en https://laravel.com/docs/5.5/controllers#resource-controllers
      | *@foreach ($roles as $id => $name) Recorre la variable $roles y obtiene el $id y el $name a partir de la variable $roles enviada desde el controlador
      | *name="roles[]" Para poder recibir el array de roles con Request desde el controlador
      | *value="{{ $name }}" e obtiene el nombre del role a partir de la variable $roles enviada desde el controlador
      | *$user->roles->contains($id) ? 'checked' : '' Operación ternaria, si la relación roles() contiene el 'id' colocarle la clase 'checked' de lo contrario no colocarle nada
      | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}