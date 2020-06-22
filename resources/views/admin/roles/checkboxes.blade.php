
{{-- roles --}}
  @foreach ($roles as $role)
    <div class="checkbox">
      <label>
        <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
          {{ $role->name }} <br>
          <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
      </label>
    </div>
  @endforeach
{{-- end roles --}}


{{-- Notas:
      | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *@foreach ($roles as $role) Recorre la variable $roles que viene de la función edit(User $user) del controlador app\Http\Controllers\Admin\UsersController.php
      | *name="roles[]" Obtener el array de roles seleccionados 
      | *$user->roles->contains($role->id) ? 'checked' : '' Si la relación roles() contiene el 'id' del usuario actual, colocar la clase 'checked' de lo contrario no colocar nada
      | *$role->permissions->pluck('name')->implode(', ') Obtiene solo el campo 'name' de la tabla permissions y le da formato
      | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}