<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* 
        | ----------------------------------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\admin\roles\create.blade.php y le pasa la variable 'role' y 'permissions'
        | *new Role Nueva instancia del modelo
        | *Permission::pluck('name', 'id'), Obtiene el campo 'name' y el campo  'id' de la tabla permissions de la base de datos
        | *No olvidar importar el modelo use Spatie\Permission\Models\Role;
        | *No olvidar importar el modelo use Spatie\Permission\Models\Permission;
        | ----------------------------------------------------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.roles.create', [

            'role' => new Role,
            'permissions' => Permission::pluck('name', 'id'),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* 
        | -----------------------------------------------------------------------------------------------------------------------------------
        | *$request->validate([]) Recibe las reglas de validación del formulario y son los campos input html con la propiedad 'name' asignada
        |   *'name' => 'required', El campo 'name' es obligatorio
        |   *'guard_name' => 'required', El campo 'guard_name' es obligatorio
        | *$role = Role::create($data); Crea el role con los datos validados y lo guarda en la variable $role
        | *No olvidar importar el modelo use Spatie\Permission\Models\Role;
        | *if ($request->has('permissions')) Verifica si hat permisos seleccionados
        |   *$role->givePermissionTo($request->permissions); Asigna los permisos seleccionados
        | *Redirecciona a la ruta con nombre 'admin.roles.index' con el mensaje de sesión 'El role fue creado correctamente'
        |   *Las rutas con nombre se definen en routes\web.php
        |   *withFlhas() Es un método mágico de Laravel que une la función with() con la función flash()
        | -----------------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        $role = Role::create($data);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
