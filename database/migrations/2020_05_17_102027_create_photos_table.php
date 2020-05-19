<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /* 
        | -------------------------------------------------------------------
        | *$table->unsignedInteger('post_id'); Campo de tipo entero sin signo
        | *$table->string('url'); Campo de tipo varchar
        | -------------------------------------------------------------------
    */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('post_id');
            $table->string('url');

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
        Schema::dropIfExists('photos');
    }
}
