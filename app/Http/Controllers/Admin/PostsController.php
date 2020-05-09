<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /* 
        | --------------------------------------------------------------
        | *Devuelve la vista resources\views\admin\posts\index.blade.php
        | --------------------------------------------------------------
    */
    public function index()
    {
        return view('admin.posts.index');
    }
}
