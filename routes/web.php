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
        Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', 'UsersController', ['as' => 'admin']);

        /* 
            | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            | *middleware('role:Admin') Define al middleware que controlará la ruta y le define que role solo podrá tener acceso
            |   *'role:Admin'
            |       *role es el alias definido en app\Http\Kernel.php
            |       *Admin Es el role definido en la base de datos y debe ser escrito igual que como está en la base de datos
            | *put() Es el método Http implementado por Laravel para actualizar roles, los navegadores actuales no soportan este método pero Laravel permite implementarlo
            | *Ruta con nombre que apunta a 'users/slugUsuario/roles' asociada a la función update(Request $request, User $user) del controlador app\Http\Controllers\Admin\UsersRolesController.php
            | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        */
        Route::middleware('role:Admin')->put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');

        /* 
            | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            | *middleware('role:Admin') Define al middleware que controlará la ruta y le define que role solo podrá tener acceso
            |   *'role:Admin'
            |       *role es el alias definido en app\Http\Kernel.php
            |       *Admin Es el role definido en la base de datos y debe ser escrito igual que como está en la base de datos
            | *put() Es el método Http implementado por Laravel para actualizar permisos, los navegadores actuales no soportan este método pero Laravel permite implementarlo
            | *Ruta con nombre que apunta a 'users/slugUsuario/permissions' asociada a la función update(Request $request, User $user) del controlador app\Http\Controllers\Admin\UsersPermissionsController.php
            | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        */
        Route::middleware('role:Admin')->put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

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
