<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}


/* Notas:
    | ----------------------------------------------------------------------------------------------------
    | *$this->call(UsersTableSeeder::class); Hace un llamado al seeder database\seeds\UsersTableSeeder.php
    | ----------------------------------------------------------------------------------------------------
*/