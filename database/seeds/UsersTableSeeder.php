<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /* 
        | -------------------------------------------------
        | *Se crean 2 usuarios, uno será admin y el otro no
        | -------------------------------------------------
    */
    public function run()
    {
        /* 
            | -----------------------------------------------------------------------------------------------------------------------------------------------------------------
            | *Borra los registros de la tabla 'permissions' de la base de datos cada que se use el comando php artisan migrate:refresh --seed para evitar registros duplicados
            | -----------------------------------------------------------------------------------------------------------------------------------------------------------------
        */
        Permission::truncate();

        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        /* 
            | -----------------------------------------------------------------------
            | *Se crean los permisos en la tabla 'permissions' de la base de datos
            |   *'View users' Poder editar usuarios
            |   *'Create users' Poder crear usuarios
            |   *'Update users' Poder actualizar usuarios
            |   *'Delete users' Poder eliminar usuarios
            | *No olvidar importar el modelo use Spatie\Permission\Models\Permission;
            | -----------------------------------------------------------------------
        */
        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

        /*
            | ------------------------------------------------------------------------------------------------------------------------------
            | *user admin
            | *Se quito la función bcrypt() del password porque se creó el mutador setPasswordAttribute($password) en el modelo app\User.php
            | ------------------------------------------------------------------------------------------------------------------------------
        */
        $admin = new User;
        $admin->name = 'Marco-admin';
        $admin->email = 'admin@mail.com';
        $admin->password = '123456';
        $admin->save();
        $admin->assignRole($adminRole);

        /*
            | ------------------------------------------------------------------------------------------------------------------------------
            | *user writer
            | *Se quito la función bcrypt() del password porque se creó el mutador setPasswordAttribute($password) en el modelo app\User.php
            | ------------------------------------------------------------------------------------------------------------------------------
        */
        $writer = new User;
        $writer->name = 'Antonio-writer';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = '123456';
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
