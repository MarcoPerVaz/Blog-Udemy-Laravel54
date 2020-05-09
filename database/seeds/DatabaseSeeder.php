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
        $this->call(PostsTableSeeder::class);
    }
}


/* Notas:
    | ----------------------------------------------------------------------------------------------------
    | *$this->call(PostsTableSeeder::class); Hace un llamado al seeder database\seeds\PostsTableSeeder.php
    | ----------------------------------------------------------------------------------------------------
*/