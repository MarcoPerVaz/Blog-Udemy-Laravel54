<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        /* 
            | --------------------------------------------------------------------------------------------------------------------------------------------------
            | *if ($post->isPublished() || auth()->check()) Verifica si el post tiene fecha de publicación ó si el usuario está autenticado,
            |  de ser cierto muestra la vista resources\views\posts\show.blade.php y le pasa la variable $post pero de ser falso muestra el error 404 Not found
            | *isPublished() Es una función incluída en el modelo app\Post.php para verificar si el post tiene fecha de publicación o es menor a la fecha actual
            | --------------------------------------------------------------------------------------------------------------------------------------------------
        */
        if ($post->isPublished() || auth()->check()) {
            return view('posts.show', compact('post'));
        }
        abort(404);
    }
}
