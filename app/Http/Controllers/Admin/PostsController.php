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
    /* 
        | -------------------------------------------------------------------------------------------------------------------
        | *Las 2 formas obtienen los posts de un usuario autenticado
        |   *$posts = Post::where('user_id', auth()->id())->get(); Obtiene los posts que tengan el id del usuario
        |   *$posts = auth()->user()->posts; Obtiene los posts del usuario usando la relación posts() del modelo app\User.php
        | -------------------------------------------------------------------------------------------------------------------
    */
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('admin.posts.index', compact('posts'));
    }
    
    /* 
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('create', new Post); Usa Policy o Política para asignar el permiso para crear un usuario
        |   *$this->authorize Usa la función authorize() para especificar la política a usar
        |   *'create' Es el nombre de la función que contiene la política create(User $user) de la Policy app\Policies\PostPolicy.php
        |   *new Post Nueva instancia del modelo app\Post.php
        | *$post = Post::create($request->all()); Obtiene todos los elementos html que incluyan la propiedad name y que estén asignados en la propiedad $fillable del modelo app\Post.php
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', $post);
    }

    /* 
        | -----------------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('view', $post); Usa Policy o Política para asignar el permiso para editar un usuario
        |   *$this->authorize Usa la función authorize() para especificar la política a usar
        |   *'view' Es el nombre de la función que contiene la política view(User $user, Post $post) de la Policy app\Policies\PostPolicy.php
        |   *$post Obtiene la información del modelo app\Post.php
        | *Devuelve la vista resources\views\admin\posts\edit.blade.php y le pasa las variables 'post', 'tags' y 'categories' como parámetro
        | *'post' => $post, Obtiene toda la información del post
        | *'tags' => Tag::all(), Obtiene todas las etiquetas del modelo app\Tag.php
        | *'categories' => Category::all() Obtiene todas las categorías del modelo app\Category.php
        | -----------------------------------------------------------------------------------------------------------------------------------
    */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }

    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('update', $post); Usa Policy o Política para asignar el permiso para actualizar un usuario
        |   *$this->authorize Usa la función authorize() para especificar la política a usar
        |   *'update' Es el nombre de la función que contiene la política update(User $user, Post $post) de la Policy app\Policies\PostPolicy.php
        |   *$post Obtiene la información del modelo app\Post.php
        | ---------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }

    /* 
        | ----------------------------------------------------------------------------------------------------------
        | *$this->authorize('delete', $post); Usa Policy o Política para asignar el permiso para eliminar un usuario
        |   *$this->authorize Usa la función authorize() para especificar la política a usar
        |   *'delete' Es el nombre de la función que contiene la política delete(User $user, Post $post) de la Policy app\Policies\PostPolicy.php
        |   *$post Obtiene la información del modelo app\Post.php
        | ----------------------------------------------------------------------------------------------------------
    */
    public function destroy(Post $post)
    {
        $post->delete();

        $this->authorize('delete', $post);

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
    }
}


/* Notas:
    | -----------------------------------------------------------------------------------------------------------
    | *Más información sobre Policies o Políticas en https://laravel.com/docs/5.5/authorization#creating-policies
    | -----------------------------------------------------------------------------------------------------------
*/