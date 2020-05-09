<?php

Route::get('/', function () { 
    $posts = App\Post::latest('published_at')->get();
    return view('welcome', compact('posts'));
});

/* 
    | ------------------------------------------------------------
    | *Ruta que apunta a '/home'
    | *Devuelve la vista resources\views\admin\dashboard.blade.php
    | ------------------------------------------------------------
*/
Route::get('home', function () {

    return view('admin.dashboard');
})->middleware('auth');

/* 
    | -----------------------------------------------------------------------------------------------------
    | *Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    |   *Ruta que apunta a '/login' con el método Http GET y con el nombre de ruta 'login' (route('login'))
    |   *La ruta está asociada a la función showLoginForm() del controlador 
    |    vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php
    |   *Muestra el formulario de login
    | *Route::post('login', 'Auth\LoginController@login');
    |   *Ruta que apunta a '/login' con el método Http POST
    |   *La ruta está asociada a la función login(Request $request) del controlador
    |    vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php
    | *Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    |   *Ruta que apunta a 'logout' con el método Http POST y con nombre 'logout' (route('logout'))
    |   *Ruta asociada a la función logout(Request $request) del controlador
    |    vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php
    | -----------------------------------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/* 
    | ---------------------------------------------
    | *Rutas para el registro, no se van a utilizar
    | ---------------------------------------------
*/
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

/* 
    | --------------------------
    | *Se agregaron estas rutas pero no se utilizan, sólo son para evitar errores
    | --------------------------
*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


/* Notas:
    | --------------------------------------------------------------------------------------------------------------
    | *Las rutas completas de Auth() están en vendor/laravel/framework/src/Illuminate/Routing/Router.php(línea 1007)
    | --------------------------------------------------------------------------------------------------------------
*/