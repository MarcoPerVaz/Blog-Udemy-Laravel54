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

        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

        /* 
            | -----------------------------------------------------------------------------------------------------------------------------------------------------
            | *Crea el permiso para actualizar roles 'Update roles' en la table 'permissions' de la base de datos y lo guarda en la variable $UpdateRolesPermission
            | -----------------------------------------------------------------------------------------------------------------------------------------------------
        */
        $UpdateRolesPermission = Permission::create(['name' => 'Update roles']);

        /*
            | -----------
            | *user admin
            | -----------
        */
        $admin = new User;
        $admin->name = 'Marco-admin';
        $admin->email = 'admin@mail.com';
        $admin->password = '123456';
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
        $writer->password = '123456';
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
