
{{-- permissions --}}
  @foreach ($permissions as $id => $name)
    <div class="checkbox">
      <label>
        <input type="checkbox" name="permissions[]" value="{{ $name }}" {{ $model->permissions->contains($id) ? 'checked' : '' }}>
          {{ $name }} 
      </label>
    </div>
  @endforeach
{{-- end permissions --}}


{{-- Notas:
      | ----------------------------------------------------------------------------------------------------------------------
      | *$model es la variable 'model' que se pasa de las diferentes vistas usando la directiva @include() que usan esta vista
      |   *@include('admin.permissions.checkboxes', ['model' => $user])
      | ----------------------------------------------------------------------------------------------------------------------
--}}