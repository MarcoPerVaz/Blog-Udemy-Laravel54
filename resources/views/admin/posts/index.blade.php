
@extends('admin.layout')

@section('header')
    <h1>
     Posts
      <small>listado</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
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


{{-- Notas:
      | ------------------------------------------------------------------------------------------------------------------------------------------
      | *@extends('admin.layout') Esta vista extiende de la vista resources\views\admin\layout.blade.php
      | *@section('header') Esta directiva asocia su contenido con la directiva @yield('header')
      | *@section('content') Esta directiva asocia su contenido con la directiva @yield('content')
      | * @foreach ($posts as $post) La variable $posts viene de la función index() del controlador app\Http\Controllers\Admin\PostsController.php
      | ------------------------------------------------------------------------------------------------------------------------------------------  
--}}