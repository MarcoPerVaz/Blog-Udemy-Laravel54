<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
            | ----------------------------------------------
            | *$table->string('name'); Campo de tipo varchar
            | ----------------------------------------------
        */
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}


/* Notas:
    | -----------------------------------------------------------------------
    | *Para saber que tipos de columnas se pueden crear desde las migraciones
    |   *https://laravel.com/docs/5.4/migrations#creating-columns
    | -----------------------------------------------------------------------
*/
