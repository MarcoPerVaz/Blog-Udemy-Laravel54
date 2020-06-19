<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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
        | -----------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\admin\users\edit.blade.php y le pasa la variable $user
        | -----------------------------------------------------------------------------------------
    */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Inyectar el modelo app\User.php como parámetro en la función update(Request $request, User $user)
        | *$request->validate() Valida los elementos input html que tengan asignada la propiedad name
        |   *'name' => 'required' El campo 'name' es obligatorio
        |   *'email' => ['required', Rule::unique('users')->ignore(($user->id))], El campo 'email' es obligatorio, se crea una regla donde el campo 'email' debe ser único y que permita actualizar si el campo 'email'
        |    es el mismo que el del usuario autenticado
        |    para evitar que lo tome como duplicado y se pueda guardar
        | *$user->update($data); Actualiza el usuario
        | *Devuelve a la vista anterior con el mensaje de sesión 'Usuario actualizado'
        |   *withFlash() es un método magico de Laravel que une la función with() con la función flash()
        | *No olvidar importar use Illuminate\Validation\Rule;
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore(($user->id))],
        ]);

        $user->update($data);

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
