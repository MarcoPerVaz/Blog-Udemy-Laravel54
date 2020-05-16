
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form action="{{ route('admin.posts.store') }}" method="POST">
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
                  <input class="form-control" type="text" value="{{ old('title') }}" name="title" 
                          placeholder="Ingresa aquí el título de la publicación">
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


{{-- Notas:
      | -------------------------------
      | *Modal para crear un nuevo post
      | -------------------------------
--}}