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
            | ----------------------------------------------------------------------------------------------------------
            | *$table->unsignedInteger('category_id'); Campo de tipo entero sin signo (es decir, solo números positivos)
            | ----------------------------------------------------------------------------------------------------------
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->mediumText('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('category_id');

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
