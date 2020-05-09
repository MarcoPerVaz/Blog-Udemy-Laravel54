<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /* 
        | --------------------------------------------------------------------------------------------------
        | *Función que devuelve a todos los posts ordenados por el campo 'published_at' de forma descendente 
        | *$posts = Post::all(); Obtiene todos los posts
        | *Devuelve la vista resources\views\welcome.blade.php y le pasa la variable $posts
        | *No olvidar importar el modelo use App\Post;
        | --------------------------------------------------------------------------------------------------
    */
    public function home()
    {
        // $posts = Post::all(); 
        $posts = Post::latest('published_at')->get();
        return view('welcome', compact('posts'));
    }
}
