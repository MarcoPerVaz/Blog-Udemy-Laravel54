
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
    <form action="{{ route('admin.posts.store') }}" method="POST">

      {{ csrf_field() }}

      <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-body">
              {{-- title --}}
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  <label for="">Título de la publicación</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                         placeholder="Ingresa aquí el título de la publicación">
                  {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>
              {{-- end title --}}

              {{-- content --}}
                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                  <label for="">Contenido de la publicación</label>
                  <textarea class="form-control" name="body" id="editor" rows="10" 
                            placeholder="Ingresa el contenido completo de la publicación">{{ old('body') }}</textarea>
                  {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
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
                      <input class="form-control pull-right" name="published_at" type="text" id="datepicker"  value="{{ old('published_at') }}">
                      </div>
                      <!-- /.input group -->
                  </div>
                {{-- end datapicker --}}

                {{-- categories --}}
                  <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                      <label for="">Categorías</label>
                      <select name="category" id="" class="form-control">
                          <option>Selecciona una categoría</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                              </option>
                          @endforeach
                      </select>
                      {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                  </div>
                {{-- end categories --}}

                {{-- tags --}}
                  <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                      <label for="">Etiquetas</label>
                      <select class="form-control select2" name="tags[]" multiple="multiple" 
                              data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} 
                                     value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                      </select>
                      {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                  </div>
                {{-- end tags --}}

                {{-- excerpt --}}
                  <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                      <label for="">Extracto de la publicación</label>
                      <textarea class="form-control" name="excerpt" 
                                placeholder="Ingresa un extracto de la publicación">{{ old('excerpt') }}</textarea>
                      {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
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
  <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
  <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <!-- Select2 -->
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
  <!-- bootstrap datepicker -->
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
        /* 
          | ----------
          | *DatePicker
          | ----------
        */
        $('#datepicker').datepicker({
          autoclose: true
        });

        /* 
          | ----------
          | *Select2
          | ----------
        */

        $(".select2").select2();
        /* 
          | ----------
          | *CKEditor
          | ----------
        */
        CKEDITOR.replace('editor');
    </script>
@endpush


{{-- Notas:
      | --------------------------------------------------------------------------------------------------------------------------------------
      | *Mostrar errores se hace para los input: 'title', 'body', 'published_at', 'categories', 'tags' y 'excerpt' 
      |   *{{ $errors->has('title') ? 'has-error' : '' }} Valida si existe el error 'title' y agrega la clase 'has-error' de lo contrario nada
      |   * $errors->first('title', '<span class="help-block">:message</span>') Muestra el primer error del campo 'title' que encuentre
      |   *{{ old('body') }} Guarda el valor del input en caso de recargar el navegador
      |   *Para 'tags' collect(old('tags'))->contains($tag->id) Que es una colección de Eloquent y sirve para recordar la selección de tags
      | *El placeholder de CkEditor no funciona (según Internet debe implementarse un plugin)
      | --------------------------------------------------------------------------------------------------------------------------------------
--}}