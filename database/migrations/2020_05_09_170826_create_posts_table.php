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
            | --------------------------------------------------------------------------------------------------------------
            | *$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            |   *->foreign('user_id') Llave foránea
            |   *->references('id')->on('users') Tiene como referencia el campo 'id' de la tabla 'users' de la base de datos
            |   *->onDelete('cascade') Cuando se elimine un usuario se eliminen también también los posts en cascada
            | --------------------------------------------------------------------------------------------------------------
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url')->unique()->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->text('iframe')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
    | -----------------
    | *Más información sobre claves o llaves foráneas en https://laravel.com/docs/5.5/migrations#foreign-key-constraints
    | -----------------
*/
