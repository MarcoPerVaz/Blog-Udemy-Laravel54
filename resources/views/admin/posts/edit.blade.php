
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

    {{-- images --}}
      @if ($post->photos->count())
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-body">
                  <div class="row">
                      @foreach ($post->photos as $photo)
                      <form action="{{ route('admin.photos.destroy', $photo) }}" method="post">
                          {{ method_field('DELETE') }}  {{ csrf_field() }}
                          <div class="col-md-2">
                              <button class="btn btn-danger btn-xs" style="position: absolute;"><i class="fa fa-remove"></i></button>
                              <img src="{{ url($photo->url) }}" class="img-responsive">
                          </div>
                      </form>
                      @endforeach
                  </div>
              </div>
          </div>
        </div>
      @endif
    {{-- end images --}}

    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                  
                  {{-- title --}}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                          <label for="">Título de la publicación</label>
                          <input type="text" class="form-control" value="{{ old('title', $post->title) }}" name="title" 
                                 placeholder="Ingresa aquí el título de la publicación">
                          {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end title --}}

                    {{-- body --}}
                      <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                          <label for="">Contenido de la publicación</label>
                          <textarea class="form-control" id="editor" name="body" rows="10" 
                              placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
                          {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end body --}}

                    {{-- iframe --}}
                      <div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
                          <label for="">Contenido embebido (iframe)</label>
                          <textarea  class="form-control" id="editor" name="iframe" rows="2" 
                              placeholder="Ingresa contenido embebido (iframe) de audio o vídeo">{{ old('iframe', $post->iframe) }}</textarea>
                          {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end iframe --}}
                </div>
                </div>
            </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">

                    {{-- published date --}}
                      <div class="form-group">
                          <label>Fecha de publicación:</label>
                          <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div>
                          <input class="form-control pull-right" name="published_at" type="text" id="datepicker"
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                          </div>
                          <!-- /.input group -->
                      </div>
                    {{-- end published date --}}

                    {{-- categories --}}
                      <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                          <label>Categorías</label>
                          <select class="form-control select2" name="category">
                              <option>Selecciona una categoría</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}"
                                      {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                                      {{ $category->name }}
                                  </option>
                              @endforeach
                          </select>
                          {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end categories --}}

                    {{-- tags --}}
                      <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                          <label>Etiquetas</label>
                          <select class="form-control select2" name="tags[]" multiple="multiple" 
                                  data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                              @foreach ($tags as $tag)
                                  <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} 
                                      value="{{ $tag->id }}">{{ $tag->name }}</option>
                              @endforeach
                          </select>
                          {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end tags --}}

                    {{-- excerpt --}}
                      <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                          <label>Extracto de la publicación</label>
                          <textarea class="form-control" name="excerpt" 
                                    placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
                          {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                      </div>
                    {{-- end excerpt --}}

                    {{-- dropzone upload images --}}
                      <div class="form-group">
                          <div class="dropzone"></div>
                      </div>
                    {{-- end dropzone upload images --}}
                    
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
    {{-- DropzoneJs 5.0.1 Css  Existen versiones posteriores --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
    <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
      <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
    {{-- DropzoneJs 5.0.1 JS Existen versiones posteriores--}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
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

        $(".select2").select2({
          tags:true
        });
        /* 
          | -----------------------------------------------------------
          | *CKEditor
          | *CKEDITOR.config.height = 330; Aumntal el alto del textarea
          | -----------------------------------------------------------
        */
        CKEDITOR.replace('editor');
        CKEDITOR.config.height = 330;

        /* 
          | --------------------------------------------------------------------------------------------------------------------
          | *Dropzone 5.0.1
          | --------------------------------------------------------------------------------------------------------------------
        */
        var myDropzone = new Dropzone('.dropzone', {
                          url: '/admin/posts/{{ $post->url }}/photos',
                          acceptedFiles: 'image/*',
                          maxFilesize: 2,
                          paramName: 'photo',
                          headers: {
                              'X-CSRF-TOKEN': '{{ csrf_token() }}'
                          },
                          dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
                      });
        myDropzone.on('error', function(file, res){
            var msg = res.photo[0];
            $('.dz-error-message:last > span').text(msg); 
        });
        Dropzone.autoDiscover = false;
      </script>
@endpush


{{-- Notas:
      | -----------------------------------------------------------------------------------------------------------------------------------
      | *{!! $post->iframe !!} Información no protegida contra ataques XSS
			| 	*Más información en Displaying Unescaped Data - https://laravel.com/docs/5.4/blade#displaying-data
      | -----------------------------------------------------------------------------------------------------------------------------------
--}}
