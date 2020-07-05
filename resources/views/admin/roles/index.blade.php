
@extends('admin.layout')

@section('header')
    <h1>
     Roles
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Usuarios</li>
    </ol>
@endsection

@section('content')
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Listado de roles</h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i> Crear role
        </a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="roles-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Guard</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->guard_name }}</td>
                  <td>

                    <a href="{{ route('admin.roles.show', $role) }}" 
                      class="btn btn-xs btn-default">
                      <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.roles.edit', $role) }}" 
                       class="btn btn-xs btn-info"><i class="fa fa-pencil"></i>
                    </a>

                    <form action="{{ route('admin.roles.destroy', $role) }}" method="post" style="display: inline;">
                      {{ csrf_field() }} {{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este role?')">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>

                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#roles-table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endpush


{{-- Notas:
      | --------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@extends('admin.layout') Extiende de la vista resources\views\admin\layout.blade.php
      | *@section('header') Esta directiva asocia su contenido con la directiva @yield('content') en la vista resources\views\admin\layout.blade.php
      | *El helper route() permite usar las rutas con nombre y se definen en routes\web.php
      | *@foreach ($roles as $role) Recorre la variable $roles que proviene de la función index() del controlador app\Http\Controllers\Admin\RolesController.php
      | *csrf_field() }} Protección contra ataques csrf
      |   *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
      | *method_field('DELETE') Los navegadores actuales no soportan 'DELETE' pero Laravel permite su implementación mediante crear un campo oculto html
      |   *Más información en https://laravel.com/docs/5.5/controllers#resource-controllers
      | *@push('styles') Directiva que permite agregar html a una vista especifica sin necesidad de tenerla en todas las vistas
      |   *Más información en https://laravel.com/docs/5.5/blade#stacks
      | --------------------------------------------------------------------------------------------------------------------------------------------------------
--}}