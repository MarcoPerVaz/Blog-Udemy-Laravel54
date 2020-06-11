<?php

/* 
    | -----------------------------------------------------------------------------------------------------------------------
    | *Ruta con nombre que apunta a '/' asociada a la función home() del controlador app\Http\Controllers\PagesController.php
    | -----------------------------------------------------------------------------------------------------------------------
*/
Route::get('/', 'PagesController@home')->name('pages.home');

/* 
    | --------------------------------------------------------------------------------------------------------------------------------
    | *Ruta con nombre que apunta a '/nosotros' asociada a la función about() del controlador app\Http\Controllers\PagesController.php
    | --------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('nosotros', 'PagesController@about')->name('pages.about');

/* 
    | ---------------------------------------------------------------------------------------------------------------------------------
    | *Ruta con nombre que apunta a '/archivo' asociada a la función archive() del controlador app\Http\Controllers\PagesController.php
    | ---------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('archivo', 'PagesController@archive')->name('pages.archive');

/* 
    | ----------------------------------------------------------------------------------------------------------------------------------
    | *Ruta con nombre que apunta a '/contacto' asociada a la función contact() del controlador app\Http\Controllers\PagesController.php
    | ----------------------------------------------------------------------------------------------------------------------------------
*/
Route::get('contacto', 'PagesController@contact')->name('pages.contact');

Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');

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
        Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');

        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.update');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
    }
);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
