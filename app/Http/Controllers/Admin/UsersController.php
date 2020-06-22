<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
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
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------------
        | *$user = new User; Nueva instancia del modelo User y se guarda en la variable $user
        | *$roles = Role::with('permissions')->get(); Obtiene la relación permissions() del modelo vendor\spatie\laravel-permission\src\Models\Role.php
        | *$permissions = Permission::pluck('name', 'id'); Obtiene el campo 'name' y el campo 'id' de la tabla permissions de la base de datos
        | *Devuelve la vista resources\views\admin\users\create.blade.php y le pasa las variables $user, $roles y $permissions
        | ---------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function create()
    {
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
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *$data = $request->validate() Valida los campos del formulario html
        |   *'name' => 'required|string|max:255', El campo 'name' es obligatorio, de tipo string y máximo de 255 caracteres
        |   *'email' => 'required|string|email|max:255|unique:users', El campo 'email' es obligatorio, de tipo email y string, máximo de 255 caracteres y debe ser único en la tabla users de la base de datos
        | *$data['password'] = str_random(8); Genera una cadena aleatoria de 8 caracteres
        | *$user = User::create($data); Creación del usuario pasando los datos validados y el password aleatorio y se guarda en la variable $user
        |   *No olvidar importar el modelo use App\User;
        | *Se asignan los roles
        |   *Como se hizo en el curso porque daba error al enviar sin roles seleccinados
        |       *if ($request->filled('roles')) Verifica si el usuario seleccionó uno o más roles
        |       *$user->assignRole($request->roles); Se asignan los roles obtenidos de la vista
        |   *Como lo podía hacer
        |       *$user->assignRole($request->roles);
        | *Se asignan los permisos
        |   *Como se hizo en el curso porque daba error al enviar sin permisos seleccinados
        |       *if ($request->filled('permissions'))  Verifica si el usuario seleccionó uno o más permisos
        |       *$user->givePermissionTo($request->permissions); Se dan los permisos obtenidos de la vista
        |   *Como lo podía hacer
        |       *$user->givePermissionTo($request->permissions);
        | *Enviamos el email En este espacio irá el código para enviar el email
        | *return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado'); Redirije a la ruta con nombre y muestra el mensaje de sesión en la vista
        |  'El usuario ha sido creado'
        |       *withFlash() Es un método mágico de Laravel que une la función with() con la función flash()
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
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

        // Enviamos el email

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
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return back()->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
