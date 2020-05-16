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

    /* 
        | ------------------------------------------------------------------------
        | *Se comenta porque la creación de un post se hará de forma personalizada
        | ------------------------------------------------------------------------
    */
    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    /* 
        | ---------------------------------------------------------------------------------------------------
        | *Guarda un post
        | *Sólo se válida el campo 'title'
        | *Post::create([]) Crea un nuevo post
        | *Redirecciona a la ruta con nombre 'admin.posts.index' y se le pasa la variable $post como un array
        |   *Las rutas con nombre se definen en routes\web.php
        | ---------------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title')),
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    /* 
        | ----------------------------------------------------------------------------------------------------------------
        | *Muestra el formulario para actualizar un post
        | *Devuelve la vista resources\views\admin\posts\edit.blade.php y le pasa las variables $categories, $tags y $post
        | ----------------------------------------------------------------------------------------------------------------
    */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /* 
        | -----------------------------------------------------------------------------------------------------------------------------------
        | *Actualiza un post
        | *$this->validate() valida que los campos sean obligatorios
        | *str_slug($request->get('title')); Convierte el texto en slug (ruta amigable)
        | *$post->save(); Actualiza el post
        | *$request->has('published_at') ?  Carbon::parse($request->get('published_at')) : null;
        |   *Operación ternaria que verifica si el post tiene fecha de publicación, si la tiene le da formato y si no tiene fecha coloca null
        | *$post->tags()->sync($request->get('tags')); Actualiza las etiquetas (se usa de esta forma porque pueden ser varias etiquetas)
        |   *Usa la relación belongsToMany - La función tags() del modelo app\Post.php
        | *Después de guardar el post y las etiquetas regresa a la vista anterior con la variable de sesión 'flash' y el mensaje
        | -----------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Post $post, Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ?  Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');
        $post->save();

        $post->tags()->sync($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido guardada');
    }
}


/* Notas:
    | ---------------------------------------------------------------------------------------------------------------------------------
    | *La función create() se pone entre comentarios porque se usará una forma especial de guardar el nombre del post (usando un modal)
    | ---------------------------------------------------------------------------------------------------------------------------------
*/