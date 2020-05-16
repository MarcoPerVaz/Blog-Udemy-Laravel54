<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /* 
        | -----------------------------------------------------------------------------------------
        | *Cada que se ejecuten los seeders se borrar la información para evitar duplicar registros
        | *new User; Nueva instancia del modelo app\User.php
        | *bcrypt() es una función para encriptación
        | *$user->save(); Se crea el nuevo usuario
        | *No olvidar importar el modelo use App\User;
        | -----------------------------------------------------------------------------------------
    */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Marco';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
