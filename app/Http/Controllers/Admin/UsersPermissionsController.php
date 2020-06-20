<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersPermissionsController extends Controller
{ 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
        | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Se inyecta el modelo app\User.php como parámetro en la función update(Request $request, User $user)
        | *No olvidar importar el modelo use App\User;
        | *return $request; Para ver en el navegador todo lo que se envia desde la vista
        | *NOTA: En el curso hubo un error ya que si no seleccionamos ningún permiso mostraba el error Type error:Return value of App\User::getStoredPermission() must implemente interface, null returned
        |  Este error a mi no me apareció pero se hizo tal como en el curso por referencia
        | *Devuelve a la vista anterior y la variable de sesión 'Los permisos han sido actualizados'
        |   *withFlash() Es un método magico de Laravel que une la función with() con la función flash()
        | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Request $request, User $user)
    {
        /* 
            | -------------------------------------------------------------------------------------------------------------------------------------
            | *Esto funciona para mi, ya que yo si puedo actualizar permisos sin tener que seleccionar ninguno
            |   *$user->syncPermissions($request->permissions); Sincroniza los permisos que vienen de la vista con los permisos de la base de datos
            |   *syncPermissions() Es una función del paquete laravel-permission
            |       *Esta función quita todos los permisos y los vuelve a asignar para evitar permisos duplicados
            |   *syncPermissions($request->permissions) Se le pasan los permisos recibidos de la vista
            | -------------------------------------------------------------------------------------------------------------------------------------
        */
        $user->syncPermissions($request->permissions);

        return back()->withFlash('Los permisos han sido actualizados');

        /* 
            | --------------------------------------------------------------------------------------------------------------------------------------
            | *Esto fue como se hizo en el curso
            |   *$user->permissions()->detach(); Se quitan los permisos
            |   *if ($request->filled('permissions')) Verifica si el usuario ha seleccionado algún permiso
            |   *$user->givePermissionTo($request->permissions); Sincroniza los permisos que vienen de la vista con los permisos de la base de datos
            | --------------------------------------------------------------------------------------------------------------------------------------
        */
        $user->permissions()->detach();

        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        return back()->withFlash('Los permisos han sido actualizados');
    }
}
