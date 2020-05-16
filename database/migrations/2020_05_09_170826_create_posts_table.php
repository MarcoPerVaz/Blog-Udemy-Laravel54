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
            | ----------------------------------------------------------------------------------
            | *$table->mediumText('excerpt')->nullable(); Acepta valores nulos o vacíos
            | *$table->text('body')->nullable(); Acepta valores nulos o vacíos
            | *$table->unsignedInteger('category_id')->nullable(); Acepta valores nulos o vacíos
            | ----------------------------------------------------------------------------------
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('url');
            $table->mediumText('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('category_id')->nullable();

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
