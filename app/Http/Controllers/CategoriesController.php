<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /* 
        | -------------------------------------------------------------------------------------------------
        | *Devuelve la vista resources\views\welcome.blade.php y le pasa las variables 'category' y 'posts'
        | *No olvidar el modelo use App\Category;
        | -------------------------------------------------------------------------------------------------
    */
    public function show(Category $category)
    {
        return view('welcome', [
            'category' => $category,
            'posts' => $category->posts()->paginate()
        ]);
    }
}
