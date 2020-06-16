<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /* 
        | -------------------------------------------------
        | *Se crean 2 usuarios, uno será admin y el otro no
        | -------------------------------------------------
    */
    public function run()
    {
        User::truncate();

        /* user 1 */
        $user = new User;
        $user->name = 'Marco';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('123456');
        $user->save();

        /* user 2 */
        $user = new User;
        $user->name = 'Antonio';
        $user->email = 'anotheruser@mail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
