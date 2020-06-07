<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /* 
        | ----------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\welcome.blade.php y le pasa las variables 'title' y 'posts'
        | *No olvidar el modelo use App\Tag;
        | ----------------------------------------------------------------------------------------------
    */
    public function show(Tag $tag)
    {
        return view('welcome', [
            'title' => "Publicaciones de la etiqueta '{$tag->name}'",
            'posts' => $tag->posts()->paginate()
        ]);
    }
}
