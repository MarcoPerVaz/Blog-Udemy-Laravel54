
@extends('admin.layout')

@section('header')
    <h1>
     Posts
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Posts</li>
    </ol>
@endsection

{{-- DataTable --}}
@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Listado de publicaciones</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="posts-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Extracto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->excerpt }}</td>
                  <td>
                    <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
        $('#posts-table').DataTable({
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
      | ------------------------------------------------------------------------------------------------------------------------------
      | *La directiva @push('') Permite agregar enlaces css y javascript pero que solo en las vista dónde lo necesitemos
      |   *Más información en https://laravel.com/docs/5.4/blade#stacks
      | *La directiva @push('styles') se enlaza con la directiva @stack('styles') de la vista resources\views\admin\layout.blade.php
      | *La directiva @push('scripts') se enlaza con la directiva @stack('scripts') de la vista resources\views\admin\layout.blade.php
      | ------------------------------------------------------------------------------------------------------------------------------
--}}