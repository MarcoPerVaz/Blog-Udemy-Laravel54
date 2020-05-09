<?php

/*
| ---------------------------------------------------------------------------------------------------------------------------------------------
| *Ruta que apunta a la raíz '/'
| *$posts = App\Post::all(); Obtiene todos los posts usando el modelo Post de Eloquent
| *$posts = App\Post::latest('published_at')->get(); Obtiene todos los posts ordenandolos mediante el campo 'published_at' de forma descendente
| *return view('welcome', compact('posts')); Se devuelve la vista resources\views\welcome.blade.php y se le pasa la variable $posts
| ---------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('/', function () {
    // $posts = App\Post::all(); 
    $posts = App\Post::latest('published_at')->get();
    return view('welcome', compact('posts'));
});
