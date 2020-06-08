<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /* 
        | ----------------------------------------------------------------------------------------------------
        | *Para usar un Form Request solo se debe inyectar como parámetro en la función
        | *No olvidar importar use App\Http\Requests\StorePostRequest;
        | *$post->update($request->all()); Actualiza todos los campos que contengan la propiedad name asignada
        | *syncTags() Es una función creada en el modelo app\Post.php
        | ----------------------------------------------------------------------------------------------------
    */
    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }
}