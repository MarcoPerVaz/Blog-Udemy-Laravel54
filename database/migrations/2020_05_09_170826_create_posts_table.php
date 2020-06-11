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
            | ----------------------------------------------------------------------------------------------------------------
            | *$table->string('url')->unique()->nullable(); Campo de tipo varchar, no se puede repetir y aceptar valores nulos
            | ----------------------------------------------------------------------------------------------------------------
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
