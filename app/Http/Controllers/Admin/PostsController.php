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

    public function store(Request $request)
    {
        /* 
            | --------------
            | *$this->validate() Se usa para las validaciones de formularios
            | *'title' => 'required' El campo 'title' es obligatorio
            | *'body' => 'required' El campo 'body' es obligatorio
            | *'category' => 'required' El campo 'category' es obligatorio
            | *'excerpt' => 'required' El campo 'excerpt' es obligatorio
            | --------------
        */
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        /* 
            | ---------------------------
            | *$request->has('published_at') ?  Carbon::parse($request->get('published_at')) : null; Operación ternaria
            | *Si tiene contenido el elemento input 'published_at' le da formato y lo guarda en el campo $post->published_at 
            |  de lo contrario guarda null (Se hace esto porque si no se guarda fecha de publicación al querer mostrar los posts marca un error
            |  ya que Carbon intenta darle formato a null y es incorrecto)
            | ---------------------------
        */
        $post->published_at = $request->has('published_at') ?  Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada');
    }
}