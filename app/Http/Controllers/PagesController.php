<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        /* 
        | -----------------------------------------------------------------------------------------------
        | *->paginate() - Al no colocar un número en la paginación Laravel paginará de 15 en 15 registros
        | -----------------------------------------------------------------------------------------------
        */
        $posts = Post::published()->paginate(4);
        return view('welcome', compact('posts'));
    }
}
