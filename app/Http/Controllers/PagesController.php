<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /* 
        | ------------------------------------------------------------------------------------------------
        | *Función que devuelve la vista resources\views\pages\home.blade.php y le pasa la variable $posts
        | ------------------------------------------------------------------------------------------------
    */
    public function home()
    {
        $posts = Post::published()->paginate(4);
        return view('pages.home', compact('posts'));
    }

    /* 
        | --------------------------------------------------------------------
        | *Función que devuelve la vista resources\views\pages\about.blade.php
        | --------------------------------------------------------------------
    */
    public function about()
    {
        return view('pages.about');
    }

    /* 
        | ----------------------------------------------------------------------
        | *Función que devuelve la vista resources\views\pages\archive.blade.php
        | ----------------------------------------------------------------------
    */
    public function archive()
    {
        return view('pages.archive');
    }

    /* 
        | ----------------------------------------------------------------------
        | *Función que devuelve la vista resources\views\pages\contact.blade.php
        | ----------------------------------------------------------------------
    */
    public function contact()
    {
        return view('pages.contact');
    }
}
