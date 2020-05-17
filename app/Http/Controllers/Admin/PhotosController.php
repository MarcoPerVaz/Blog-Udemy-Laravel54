<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    /* 
        | ----------------------------------------------------------------------------
        | *Función que guardará las imagenes asociadas al post
        | *De momento solo regresa un texto 'Procesando imagen'
        | *No olvidar importar el modelo use App\Post;
        | *Después de mover y renombrar el controlador
        |   *No olvidar cambiar el namespace por namespace App\Http\Controllers\Admin;
        |   *No olvidar importar use App\Http\Controllers\Controller;
        |   *Cambiar el nombre de la clase por class PhotosController
        | ----------------------------------------------------------------------------
    */
    public function store(Post $post)
    {
        return 'Procesando imagen';
    }
}
