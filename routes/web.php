<?php

Route::get('/', 'PagesController@home');

/* 
    | --------------------------------------------------------------------------------------------------------------------------------
    | *Ruta que apunta a 'blog/idPost' y está asociada a la función show(Post $post) del controlador app\Http\Controllers\PostsController.php
    | *Ruta que no se necesita loguearse
    | *El parámetro de la ruta `/{post}` debe llamarse igual al parámetro de la función `show(Post $post)`
    | --------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('blog/{post}', 'PostsController@show');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
        Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    }
);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
