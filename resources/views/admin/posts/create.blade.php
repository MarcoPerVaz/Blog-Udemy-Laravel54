
@extends('admin.layout')

@section('header')
    <h1>
     Posts
      <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
      <li class="active">Crear</li>
    </ol>
@endsection

@section('content')
  <div class="row">
    <form>
      <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-body">
              {{-- title --}}
                <div class="form-group">
                  <label for="">Título de la publicación</label>
                  <input type="text" class="form-control" name="title" placeholder="Ingresa aquí el título de la publicación">
                </div>
              {{-- end title --}}

              {{-- content --}}
                <div class="form-group">
                  <label for="">Contenido de la publicación</label>
                  <textarea name="excerpt" rows="10" placeholder="Ingresa el contenido completo de la publicaicón" class="form-control"></textarea>
                </div>
              {{-- end content --}}
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="box box-primary">
              <div class="box-body">
                {{-- datapicker --}}
                  <div class="form-group">
                      <label>Fecha de publicación:</label>
                      <div class="input-group date">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                      <input name="published_at" type="text" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                  </div>
                {{-- end datapicker --}}

                {{-- categories --}}
                  <div class="form-group">
                      <label for="">Categorías</label>
                      <select name="" id="" class="form-control">
                          <option value="">Selecciona una categoría</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                  </div>
                {{-- end categories --}}

                {{-- excerpt --}}
                  <div class="form-group">
                      <label for="">Extracto de la publicación</label>
                      <textarea name="excerpt" placeholder="Ingresa un extracto de la publicación" class="form-control"></textarea>
                  </div>
                {{-- end excerpt --}}

                {{-- button save --}}
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
                  </div>
                {{-- end button save --}}
              </div>
          </div>
      </div>
    </form>
  </div>
@endsection

@push('styles')
  <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
@endpush

@push('scripts')
  <!-- bootstrap datepicker -->
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
        $('#datepicker').datepicker({
          autoclose: true
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