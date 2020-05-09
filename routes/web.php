<?php

Route::get('/', function () { 
    $posts = App\Post::latest('published_at')->get();
    return view('welcome', compact('posts'));
});

/* 
    | ------------------------------------------------------------
    | *Ruta que apunta a '/admin'
    | *Devuelve la vista resources\views\admin\dashboard.blade.php
    | ------------------------------------------------------------
*/
Route::get('admin', function () {
    return view('admin.dashboard');
});