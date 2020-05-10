<?php

Route::get('/', 'PagesController@home');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        Route::get('/', 'AdminController@index')->name('dashboard');

        /* 
            | --------------------------------------------------------------------------------------------------------------------------------
            | *Ruta que apunta a '/posts/create' asociada a la función create() del controlador app\Http\Controllers\Admin\PostsController.php
            | --------------------------------------------------------------------------------------------------------------------------------
        */
        Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
    }
);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
