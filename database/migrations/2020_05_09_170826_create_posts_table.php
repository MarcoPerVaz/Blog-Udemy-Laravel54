<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 
            | -----------------------------------------------------------------------------------------------
            | *$table->string('title'); Campo de tipo varchar
            | *$table->mediumText('excerpt'); Campo de tipo mediumtext
            | *$table->text('body'); Campo de tipo text
            | *$table->timestamp('published_at')->nullable(); Campo de tipo timestamp y permite valores nulos
            | -----------------------------------------------------------------------------------------------
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->mediumText('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('posts');
    }
}


/* Notas:
    | -----------------------------------------------------------------------
    | *Para saber que tipos de columnas se pueden crear desde las migraciones
    |   *https://laravel.com/docs/5.4/migrations#creating-columns
    | -----------------------------------------------------------------------
*/
