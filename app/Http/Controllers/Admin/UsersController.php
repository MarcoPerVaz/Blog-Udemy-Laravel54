<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

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
        | -------------------------------------------------------------------------------------------------------------------------------------------------
        | *Inyectar el modelo app\User.php como parámetro en la función update(Request $request, User $user)
        | *No olvidar importar el FormRequest use App\Http\Requests\UpdateUserRequest;
        | *Validaciones para los campos 'name' e 'email', funciona pero fue pasada al form request app\Http\Requests\UpdateUserRequest.php
        |   *$data = $request->validate([
        |      'name' => 'required',
        |      'email' => ['required', Rule::unique('users')->ignore(($user->id))],
        |    ]);
        | *Validaciones para los campos 'password' y 'confirmed password', funciona pero fue pasado al form request app\Http\Requests\UpdateUserRequest.php
        |   if ($request->filled('password')) {
        |      $rules['password'] = ['confirmed', 'min:6'];
        |   }
        | *$user->update($request->validated()); Valida los campos input html
        | *Quitar la importación use Illuminate\Validation\Rule; ya que fue pasada al form request app\Http\Requests\UpdateUserRequest.php
        | -------------------------------------------------------------------------------------------------------------------------------------------------
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
