<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /* 
        | ------------------------------------------------------------------------------------------------------
        | *$table->unsignedInteger('post_id'); Campo de tipo entero sin signo (es decir solo números positivos)
        |   *Campo que guardará los id de los posts
        | *$table->unsignedInteger('tag_id'); Campo de tipo entero sin signo (es decir solo números positivos)
        |   *Campo que guardará los id de los tags
        | ------------------------------------------------------------------------------------------------------
    */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');

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
        Schema::dropIfExists('post_tag');
    }
}
