<?php

/*
| --------------------------------------------------------------------------------------------------------------------
| *Ruta que apunta a la raíz '/' asociada a la función home() del controlador app\Http\Controllers\PagesController.php
| --------------------------------------------------------------------------------------------------------------------
*/
Route::get('/', 'PagesController@home');

/* 
    | ----------------------------------------------------------------------------------------------------------------
    | *Ruta que apunta a '/home' asociada a la función index() del controlador app\Http\Controllers\HomeController.php
    | ----------------------------------------------------------------------------------------------------------------
*/
Route::get('home', 'HomeController@index');

/* 
    | ----------------------------------------------------------------------------------------------------------
    | *Grupo de rutas que apuntan a 'admin/' y otras rutas
    | *'prefix' => 'admin', Significa que todas las rutas tendrán '/admin/' en la ruta
    |   *Ejemplo: 'admin/posts'
    | *'namespace' => 'Admin', Los controladores tendrán 'Admin/' en la ruta
    |   *Ejemplo: 'Admin/PostsController@index'
    | *'middleware' => 'auth' Todas las rutas incluídas en el grupo de rutas, el usuario deberá estar autenticado
    |   *Middleware 'auth'
    | ----------------------------------------------------------------------------------------------------------
*/
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {
        /* 
            |-------------------------------------------------------------------------------------------------
            | *Ruta con nombre que apunta a 'admin/posts' y está asociada a la función index() del controlador 
            |  app\Http\Controllers\Admin\PostsController.php
            |-------------------------------------------------------------------------------------------------
        */
        Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        // Otras rutas de administración
    }
);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
