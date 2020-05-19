<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /* 
        | ------------------------------------------
        | *Deshabilita la protección Mass assignment
        |  *No es necesaria la protección
        | ------------------------------------------
    */
    protected $guarded = [];
}


/* Notas:
    | -------------------------------------------------------------
    | *Más información sobre la protección contra asignación masiva
    |   *https://laravel.com/docs/5.4/eloquent#mass-assignment
    | -------------------------------------------------------------
*/
