<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::allowed()->get(); 
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new User);

        $user = new User;

        $roles = Role::with('permissions')->get();

        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $data['password'] = str_random(8);

        $user = User::create($data);

        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }

        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        UserWasCreated::dispatch($user, $data['password']);

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();

        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.edit', compact('user','roles','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
        | -------------------------------------------------------------------------------------------------------------
        | *¨Devuelve la vista resources\views\admin\users\edit.blade.php con el mensaje de sesión 'Usuario actualizado'
        | -------------------------------------------------------------------------------------------------------------
    */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *destroy(User $user) Se inyecta el modelo app\User.php como parámetro en la función
        | *$this->authorize('delete', $user); Usa la función delete(User $user, User $model) de la Policy app\Policies\UserPolicy.php
        | *$user->delete(); Elimina el usuario de la tabla 'users' de la base de datos
        | *Redirecciona a la vista resources\views\admin\users\index.blade.php con el mensaje de sesión 'Usuario eliminado'
        | *Para eliminar los posts asociados al usuario recien eliminado se usa $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        | *La eliminación de roles y permisos se hace en la función bootHasRoles() del archivo vendor\spatie\laravel-permission\src\Traits\HasRoles.php que viene en el paquete laravel-permission
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
    }
}


/* Notas:
    | ----------------------------------------------------------------------------------------------------------------------------------------------------
    | *withFlash() Es un método mágico de Laravel que une la función with() con la función flash()
    | *Nota: En el curso la función bootHasRoles() muestra que elimina tanto roles como permisos, pero en la función de mi proyecto solo elimina los roles
    |        pero en mi proyecto también elimina los permisos así que funciona bien
    | ----------------------------------------------------------------------------------------------------------------------------------------------------
*/
