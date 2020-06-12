<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /* 
        | -------------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\pages\home.blade.php y le pasa las variables 'title' y 'posts'
        | -------------------------------------------------------------------------------------------------
    */
    public function show(Category $category)
    {
        return view('pages.home', [
            'title' => "Publicaciones de la categoría '{$category->name}'",
            'posts' => $category->posts()->paginate()
        ]);
    }
}
