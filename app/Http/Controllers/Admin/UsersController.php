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
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *$users = User::allowed()->get(); Se obtiene la consulta queryscope de la función scopeAllowed($query) del modelo app\User.php y se guarda en la variable $users
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
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
    /* 
        | -----------------------------------------------------------------------------------------------------------------
        | *$this->authorize('create', new User); Usa la función create(User $user) de la Policy app\Policies\UserPolicy.php
        | -----------------------------------------------------------------------------------------------------------------
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
    /* 
        | -----------------------------------------------------------------------------------------------------------------
        | *$this->authorize('create', new User); Usa la función create(User $user) de la Policy app\Policies\UserPolicy.php
        | -----------------------------------------------------------------------------------------------------------------
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
    /* 
        | --------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('view', $user); Usa la función view(User $authUser, User $user) de la Policy app\Policies\UserPolicy.php
        | --------------------------------------------------------------------------------------------------------------------------
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
    /* 
        | ------------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('update', $user); Usa la función update(User $authUser, User $user) de la Policy app\Policies\UserPolicy.php
        | ------------------------------------------------------------------------------------------------------------------------------
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
        | ------------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('update', $user); Usa la función update(User $authUser, User $user) de la Policy app\Policies\UserPolicy.php
        | ------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

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


/* Notas:
    | -----------------------------------------------------------------------------------------------------------
    | *Más información sobre Policies o Políticas en https://laravel.com/docs/5.5/authorization#creating-policies
    | -----------------------------------------------------------------------------------------------------------
*/
