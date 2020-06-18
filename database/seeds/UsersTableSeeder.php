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

        /* 
            | --------------------------------------------------------------------
            | *Se crean los permisos en la tabla 'permissions' de la base de datos
            |   *'View posts' Poder editar posts
            |   *'Create posts' Poder crear posts
            |   *'Update posts' Poder actualizar posts
            |   *'Delete posts' Poder eliminar posts
            | *No olvidar importar el modelo use Spatie\Permission\Models\Permission;
            | --------------------------------------------------------------------
        */
        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        /*
            | -----------
            | *user admin
            | -----------
        */
        $admin = new User;
        $admin->name = 'Marco-admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole($adminRole);

        /*
            | ------------
            | *user writer
            | ------------
        */
        $writer = new User;
        $writer->name = 'Antonio-writer';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = bcrypt('123456');
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
