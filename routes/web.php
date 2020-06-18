<?php

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('nosotros', 'PagesController@about')->name('pages.about');
Route::get('archivo', 'PagesController@archive')->name('pages.archive');
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
        Route::get('/', 'AdminController@index')->name('dashboard');
        
        /* 
            | -----------------------------------------------------------------------------------------------------------------------------------------
            | *Ruta resource que incluye las rutas para: index, create, store, edit, update y destroy, excepto la ruta show y se renombran como 'admin'
            |   *Ejemplo de nombre de las rutas: 'admin.posts.index' dónde 'admin' es lo que se determinó como 'as'
            | -----------------------------------------------------------------------------------------------------------------------------------------
        */
        Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
        /* 
            | -------------------------------------------------------------------------------------------------------------------------
            | *Ruta resource que incluye las rutas para: index, create, store, show, edit, update y destroy y se renombran como 'admin'
            |   *Ejemplo de nombre de las rutas: 'admin.users.index' dónde 'admin' es lo que se determinó como 'as'
            | -------------------------------------------------------------------------------------------------------------------------
        */
        Route::resource('users', 'UsersController', ['as' => 'admin']);

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
