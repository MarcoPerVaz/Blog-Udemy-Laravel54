
@extends('admin.layout')

@section('content')
    <div class="row">
      {{-- profile --}}
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
                  src="/adminlte/img/user4-128x128.jpg" 
                  alt="{{ $user->name }}">
              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Publicaciones</b> <a class="pull-right">{{ $user->posts->count() }}</a>
                </li>
                @if ($user->roles->count())
                  <li class="list-group-item">
                    <b>Roles</b> <a class="pull-right">{{ $user->getRoleNames()->implode(', ') }}</a>
                  </li>
                @endif
              </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      {{-- end profile --}}
      {{-- user posts --}}
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Publicaciones</h3>
            </div>
            <div class="box-body">
              @forelse ($user->posts as $post)
                <a href="{{ route('posts.show', $post) }}" target="__blank">
                  <strong>{{ $post->title }}</strong>
                </a>
                <br>
                <small class="text-muted">Publicado el {{ $post->published_at->format('d/m/Y') }}</small>
                <p class="text-mut">{{ $post->excerpt }}</p>
                @unless ($loop->last )
                  <hr>  
                @endunless
              @empty
                <small class="text-mute">No tiene ninguna publicación</small>
              @endforelse
            </div>
          </div>
        </div>
      {{-- end user posts --}}
      {{-- user roles --}}
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roles</h3>
            </div>
            <div class="box-body">
              @forelse ($user->roles as $role)
                <strong>{{ $role->name }}</strong>
                @if ( $role->permissions->count() )
                  <br>
                  <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</small> 
                @endif
                @unless ($loop->last )
                  <hr>  
                @endunless
              @empty
                <small class="text-mute">No tiene ningún role asociado</small>
              @endforelse
            </div>
          </div>
        </div>
      {{-- end user roles --}}
      {{-- additional permissions --}}
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Permisos adicionales</h3>
            </div>
            <div class="box-body">
              @forelse ($user->permissions as $permission)
                  <strong>{{ $permission->name }}</strong>
                <br>
                @unless ($loop->last )
                  <hr>  
                @endunless
              @empty
                <small class="text-mute">No tiene permisos adicionales</small>
              @endforelse
            </div>
          </div>
        </div>
      {{-- end additional permissions --}}
    </div>
@endsection


{{-- Notas:
      | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@extends('admin.layout') Extiende de la vista resources\views\admin\layout.blade.php
      | *@section('content') Asociada a la vista que contenga la directiva @yield('content') en la vista resources\views\admin\layout.blade.php línea 282
      | *$user->posts->count() Cuenta cuantos posts tiene usando la relación posts() del modelo app\User.php
      | *$user->getRoleNames()->implode(', ') Obtiene todos los roles y le da formato colocando espacios y coma usando la relación getRoleNames(): Collection 
      |  del modelo vendor\spatie\laravel-permission\src\Traits\HasRoles.php
      | *$user->roles->count() Cuenta los roles usando la relación roles(): MorphToMany del modelo vendor\spatie\laravel-permission\src\Traits\HasRoles.php
      | *El helper route() permite usar rutas con nombre y se definen en routes\web.php
      | *La variable $loop es una variable incluída en la directiva @foreach de Laravel
      | *$role->permissions->count() Cuenta los permisos usando la relación permissions(): BelongsToMany del modelo vendor\spatie\laravel-permission\src\Models\Role.php
      | *$role->permissions->pluck('name')->implode(', ') Obtiene solo el nombre de los permisos y le da formato dandole espacio y coma por cada permiso
      | *@forelse ($user->permissions as $permission) Recorre todos los permisos del usuario usando la relación permissions(): BelongsToMany 
      |  del modelo vendor\spatie\laravel-permission\src\Models\Role.php
      | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}