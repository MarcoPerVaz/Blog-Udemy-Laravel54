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
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Se inyecta el modelo app\User.php como parámetro en la función update(Request $request, User $user)
        | *No olvidar importar el modelo use App\User;
        | *return $request; Para ver en el navegador todo lo que se envia desde la vista
        | *NOTA: En el curso hubo un error ya que si no seleccionamos ningún role mostraba el error Type error:Return value of App\User::getStoredRole() must implemente interface, null returned
        |  Este error a mi no me apareció pero se hizo tal como en el curso por referencia
        | *Devuelve a la vista anterior y la variable de sesión 'Los roles han sido actualizados'
        |   *withFlash() Es un método magico de Laravel que une la función with() con la función flash()
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        /* 
            | -------------------------------------------------------------------------------------------------------------------
            | *Esto funciona para mi, ya que yo si puedo actualizar roles sin tener que seleccionar ninguno
            |   *$user->syncRoles($request->roles); Sincroniza los roles que vienen de la vista con los roles de la base de datos
            |   *syncRoles() Es una función del paquete laravel-permission
            |       *Esta función quita todos los roles y los vuelve a asignar para evitar roles duplicados
            |   *syncRoles($request->roles) Se le pasan los roles recibidos de la vista
            | -------------------------------------------------------------------------------------------------------------------
        */
        $user->syncRoles($request->roles);

        return back()->withFlash('Los roles han sido actualizados');

        /* 
            | --------------------------------------------------------------------------------------------------------------------
            | *Esto fue como se hizo en el curso
            |   *$user->roles()->detach(); Se quitan los role
            |   *if ($request->filled('roles')) Verifica si el usuario ha seleccionado algún role
            |   *$user->assignRole($request->roles); Sincroniza los roles que vienen de la vista con los roles de la base de datos
            | --------------------------------------------------------------------------------------------------------------------
        */
        $user->roles()->detach();

        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }

        return back()->withFlash('Los roles han sido actualizados');
    }
}
