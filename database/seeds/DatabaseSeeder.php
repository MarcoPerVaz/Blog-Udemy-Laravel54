<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------
        | *La idea es primero deshabilitar las llaves foráneas, luego ejecutar los seeders y después volver a habilitar las llaves foráneas
        |   *DB::statement('SET FOREIGN_KEY_CHECKS=0'); Deshabilita la revisión de llaves foráneas
        |   *DB::statement('SET FOREIGN_KEY_CHECKS=1'); Habilita la revisión de llaves foráneas
        | ---------------------------------------------------------------------------------------------------------------------------------
    */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}