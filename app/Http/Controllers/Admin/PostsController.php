<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /* 
        | ------------------------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\admin\posts\create.blade.php que muestra el formulario para crear un post
        | ------------------------------------------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.posts.create');
    }
}