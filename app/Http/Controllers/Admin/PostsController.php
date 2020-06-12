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

    /* 
        | ----------------------------------------------------------------------------------
        | *Post::create([]) Crea un post
        | *'title' => $request->get('title'), Asigna el input name=title al campo 'title'
        | *'user_id' => auth()->id() Asigna el id del usuario autenticado al campo 'user_id'
        | ----------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|min:3']);

        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id()
        ]);

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

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
    }
}