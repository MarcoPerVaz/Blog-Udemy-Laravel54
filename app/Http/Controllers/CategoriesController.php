<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /* 
        | ----------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\welcome.blade.php y le pasa las variables 'title' y 'posts'
        | ----------------------------------------------------------------------------------------------
    */
    public function show(Category $category)
    {
        return view('welcome', [
            'title' => "Publicaciones de la categoría '{$category->name}'",
            'posts' => $category->posts()->paginate()
        ]);
    }
}
