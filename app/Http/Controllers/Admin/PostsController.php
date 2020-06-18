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
        $posts = Post::allowed()->get();
        return view('admin.posts.index', compact('posts'));
    }
    
    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', $post);
    }

    /* 
        | --------------------------------------------------------------------------------------------------------------------------
        | *$this->authorize('update', $post); Usa la función update(User $user, Post $post) de la Policy app\Policies\PostPolicy.php
        | --------------------------------------------------------------------------------------------------------------------------
    */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }

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