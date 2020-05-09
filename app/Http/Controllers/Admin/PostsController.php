<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /* 
        | -------------------------------------------------------------------------------------------
        | *$posts = Post::all(); Obtiene todos los posts del modelo app\Post.php
        | *Devuelve la vista resources\views\admin\posts\index.blade.php y le pasa la variable $posts
        | *No olvidar importar el modelo use App\Post;
        | -------------------------------------------------------------------------------------------
    */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
}