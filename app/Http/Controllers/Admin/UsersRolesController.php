<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersRolesController extends Controller
{ 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
        | ----------------------------------------------------------------------------------------------------
        | *Se inyecta el modelo app\User.php como parámetro en la función update(Request $request, User $user)
        | *No olvidar importar el modelo use App\User;
        | * $user->syncRoles($request->roles);
        |   *syncRoles() Es una función del paquete laravel-permission
        |       *Esta función quita todos los roles y los vuelve a asignar para evitar roles duplicados
        |   *syncRoles($request->roles) Se le pasan los roles recibidos de la vista
        | *Devuelve a la vista anterior y la variable de sesión 'Los roles han sido actualizados'
        |   *withFlash() Es un método magico de Laravel que une la función with() con la función flash()
        | ----------------------------------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles);

        return back()->withFlash('Los roles han sido actualizados');
    }
}
