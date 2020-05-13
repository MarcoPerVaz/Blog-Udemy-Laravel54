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
        /* 
            | ------------------------------------------------------------------------------------
            | *Obtiene a todos los posts de forma descendente omitiendo los posts sin fecha(nulos)
            | ------------------------------------------------------------------------------------
        */
        // $posts = Post::whereNotNull('published_at')
        //         ->latest('published_at')
        //         ->get();

        /* 
            | ----------------------------------------------------------------------------------------------
            | *Obtiene a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
            | ----------------------------------------------------------------------------------------------
        */
        // $posts = Post::whereNotNull('published_at')
        //         ->where('published_at', '<=', Carbon::now())
        //         ->latest('published_at')
        //         ->get();

        /* 
            | -----------------------------------------------------------------------------------------------
            | *Obtiene el QueryScope published() de la función scopePublished($query) del modelo app\Post.php
            |   *El nombre de la queryscope es scopePublished() pero al llamarlo solo se usa published()
            | -----------------------------------------------------------------------------------------------
        */
        $posts = Post::published()->get();
        return view('welcome', compact('posts'));
    }
}
