<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
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
        | *Category::all(); Obtiene todas las actegorías de la tabla 'categories' de la base de datos
        | *Devuelve la vista resources\views\admin\posts\create.blade.php que muestra el formulario para crear un post y se le
        |  pasa la variable $categories
        | *No olvidar importar el modelo use App\Category;
        | ------------------------------------------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
}