<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            | ----------------------------------------------------------------------------------------------------------------------
            | *Role::truncate(); Borra los registros de la tabla roles cada que se haga un migrate:refresh para evitar duplicaciones
            | *No olvidar importar el modelo use Spatie\Permission\Models\Role;
            | ----------------------------------------------------------------------------------------------------------------------
        */
        Role::truncate();

        User::truncate();

        /* 
            | -----------------------------------------------------------------------------------------------------------------
            | *$adminRole = Role::create(['name' => 'Admin']); Se crea el role 'Admin' y se guarda en la variable $adminRole
            | *$adminRole = Role::create(['name' => 'Writer']); Se crea el role 'Writer' y se guarda en la variable $writerRole
            | *No olvidar importar el modelo use Spatie\Permission\Models\Role;
            | -----------------------------------------------------------------------------------------------------------------
        */
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        /*
            | ----------------------------------------------------------------------------
            | *user admin
            | *$admin->assignRole($adminRole); Le asigna el role 'admin' al usuario $admin
            | ----------------------------------------------------------------------------
        */
        $admin = new User;
        $admin->name = 'Marco-admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole($adminRole);

        /*
            | -----------------------------------------------------------------------------
            | *user writer
            | *$admin->assignRole($writerRole); Le asigna el role 'admin' al usuario $admin
            | -----------------------------------------------------------------------------
        */
        $writer = new User;
        $writer->name = 'Antonio-writer';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = bcrypt('123456');
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
