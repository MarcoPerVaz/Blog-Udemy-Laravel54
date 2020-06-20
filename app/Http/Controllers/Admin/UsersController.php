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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *$permissions = Permission::pluck('name', 'id'); Obtiene los campos 'name' e 'id' de la tabla permissions de la base de datos y la guarda en la variable $permissions
        |   *Más información sobre la función pluck() en https://laravel.com/docs/5.5/collections#method-pluck
        | *No olvidar importar el modelo use Spatie\Permission\Models\Permission;
        | *Devuelve la vista resources\views\admin\users\edit.blade.php y le pasa la varible $user, $roles y $permissions
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');

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
