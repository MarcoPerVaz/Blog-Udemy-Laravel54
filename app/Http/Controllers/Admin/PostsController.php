<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *Guarda el post
        | *Carbon::parse($request->get('published_at')); Carbon formatea la fecha al formato correcto
        | *No olvidar importar la librería Carbon use Carbon\Carbon;
        | *$post->tags()->attach($request->get('tags')); Guarda el array de etiquetas
        |   *tags() Es la relación en el modelo app\Post.php
        | *return back()->with('flash', 'Tu publicación ha sido creada'); Devuelve la vista anterior y le pasa la variable de sesión 'flash'
        | ----------------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // Aquí van las validaciones

        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category');
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada');
    }
}