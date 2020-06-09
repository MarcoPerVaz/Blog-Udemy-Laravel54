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

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }

    /* 
        | -----------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Función que elimina el post y todo lo relacionado con el
        | *La eliminación física de las imágenes se hace a tráves de la función boot en el modelo app\Photo.php
        | *La eliminación de las imágenes de la base de datos y las etiquetas se hace a tráves de la función boot en el modelo app\Post.php
        | *Para eliminar las relaciones desde el controlador del post
        |   *Elimina las etiquetas relacionadas al post a eliminar
        |       *$post->tags()->detach();
        |           *Más información sobre detach en https://laravel.com/docs/5.4/eloquent-relationships#updating-many-to-many-relationships
        |   *Elimina las fotos de la base de datos usando la relación photos() del modelo app\Post.php
        |       *post->photos()->delete();
        |   *Recorre todas las fotos y las elimina de la base de datos usando la relación photos() del modelo app\Post.php
        |       *foreach ($post->photos as $photo) { $photo->delete(); } 
        |       *post->photos()->delete();
        |   *Recorre todas las fotos usando colecciones  y las elimina de la base de datos usando la relación photos() del modelo app\Post.php
        |       *$post->photos->each(function() { $photo->delete(); } 
        |   *Recorre todas las fotos usando colecciones y las elimina de la base de datos usando la relación photos() del modelo app\Post.php funciona igual que la anterior
        |    pero expresada de forma más simple
        |       *$post->photos->each->delete(); 
        | *$post->delete(); Elimina el post
        | -----------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
    }
}