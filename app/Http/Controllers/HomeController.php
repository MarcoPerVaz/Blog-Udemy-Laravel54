<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *La función __construct() siempre se ejecuta antes que cualquier otra función
        | *$this->middleware('auth'); Cualquier función después de __construct() sólo se podrá acceder a ella si el usuario está autenticado
        | *$this->middleware('auth'); Se encuentra en vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php
        | *Los middlewares se registran en app\Http\Kernel.php
        | ----------------------------------------------------------------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* 
        | ------------------------------------------------------------------------
        | *Función que devuelve la vista resources\views\admin\dashboard.blade.php
        | ------------------------------------------------------------------------
    */
    public function index()
    {
        return view('admin.dashboard');
    }
}
