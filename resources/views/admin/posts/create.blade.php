
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form action="{{ route('admin.posts.store', '#create') }}" method="POST">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agrega el título de tu nueva publicación</h4>
          </div>
          <div class="modal-body">

            {{-- title --}}
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                  <input class="form-control" type="text" value="{{ old('title') }}" name="title" id="post-title"
                          placeholder="Ingresa aquí el título de la publicación" autofocus required>
                  {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
              </div>
            {{-- end title --}}

          </div>
          <div class="modal-footer">
            {{-- button close --}}
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- end button close --}}

            {{-- button create post --}}
              <button class="btn btn-primary">Crear publicación</button>
            {{-- end button create post --}}
          </div>
        </div>
      </div>
    </form>
</div>

@push('scripts')
  {{-- 
      | -------------------------------------------------------------------------------------------------------------
      | *Script para verificar si el modal está abierto
      | * if (window.location.hash === '#create')  Si la url tiene #create muestra el modal, del contrario lo esconde
      | -------------------------------------------------------------------------------------------------------------
  --}}
  <script>
    if (window.location.hash === '#create') 
    {
      $('#myModal').modal('show');
    }
    $('#myModal').on('hide.bs.modal', function(){
        window.location.hash = '#';
    });
    $('#myModal').on('shown.bs.modal', function(){
      $('#post-title').focus();
        window.location.hash = '#create';
    });
  </script>
@endpush