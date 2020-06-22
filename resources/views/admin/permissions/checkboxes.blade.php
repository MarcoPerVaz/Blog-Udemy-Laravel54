
{{-- permissions --}}
  @foreach ($permissions as $id => $name)
    <div class="checkbox">
      <label>
        <input type="checkbox" name="permissions[]" value="{{ $name }}" {{ $user->permissions->contains($id) ? 'checked' : '' }}>
          {{ $name }} 
      </label>
    </div>
  @endforeach
{{-- end permissions --}}


{{-- Notas:
      | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@foreach ($permissions as $id => $name) Recorre la variable $permissions que viene de la función edit(User $user) del controlador app\Http\Controllers\Admin\UsersController.php
      |  y obtiene solo el campo 'name' y 'id'
      | *name="permissions[]" Obtener el array de permisos seleccionados 
      | *$user->permissions->contains($id) ? 'checked' : '' Si la relación permissions() contiene el 'id' del role actual, colocar la clase 'checked' de lo contrario no colocar nada
      | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}