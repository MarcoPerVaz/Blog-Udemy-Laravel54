<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /* 
        | -----------------------------------------------------------------------------------
        | *Muestra la información de un post
        | *Se inyecta el modelo usando Model Binding - show(Post $post)
        | *Devuelve la vista resources\views\posts\show.blade.php y le pasa la variable $post
        | *No olvidar importar el modelo use App\Post;
        | -----------------------------------------------------------------------------------
    */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}


/* Notas:
    | ------------------------------------------------------------------------------------------
    | *Este controlador es para mostrar la información de un post si necesidad de iniciar sesión
    | ------------------------------------------------------------------------------------------
*/
