@extends('admin.layout')

@section('header')
    <h1>
     Usuarios
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Usuarios</li>
    </ol>
@endsection

{{-- dataTable --}}
  @section('content')
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Listado de usuarios</h3>
          <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Crear usuario
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="users-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                    <td>

                      <a href="{{ route('admin.users.show', $user) }}" 
                        class="btn btn-xs btn-default"
                        target="_blank">
                        <i class="fa fa-eye"></i>
                      </a>

                      <a href="{{ route('admin.users.edit', $user) }}" 
                        class="btn btn-xs btn-info"><i class="fa fa-pencil"></i>
                      </a>

                      <form action="{{ route('admin.users.destroy', $user) }}" method="post" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')">
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
{{-- end datatable --}}

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
        $('#users-table').DataTable({
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
      | -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@foreach ($users as $user) Recorre todos los registros de la variable $users que vienen de la función index() del controlador app\Http\Controllers\Admin\UsersController.php
      | *$user->getRoleNames()->implode(', ') Obtienen todos los roles de los usuarios y les da un formato
      |   *Ejemplo: Admin, Writer
      |   *getRoleNames() función que viene en el paquete laravel-permission y obtiene el campo 'name' de la tabla roles de la base de datos
      |   *implode() agrega una coma y un espacio por cada role que encuentra
      | *El helper route() permite usar rutas con nombre y se definen en routes\web.php
      | *csrf_field() Protección contra ataques csrf
      |   *Más información en https://laravel.com/docs/5.5/csrf#csrf-introduction
      | *method_field('DELETE') Los navegadores por defecto no soportan el método httpm 'delete' pero laravel ofrece la opción de usar 'delete' en los formularios
      |   *Más información en https://laravel.com/docs/5.5/controllers#resource-controllers
      | -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}