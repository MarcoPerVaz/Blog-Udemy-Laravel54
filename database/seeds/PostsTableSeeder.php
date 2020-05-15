<?php

use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Category::truncate();

        /* 
            |-------------
            | *Categoría 1
            |-------------
        */
        $category = new Category;
        $category->name = "Categoría 1";
        $category->save();

        /* 
            |-------------
            | *Categoría 2
            |-------------
        */
        $category = new Category;
        $category->name = "Categoría 2";
        $category->save();

        /* 
            |-------------------------------------------------------------------------------------
            | *Mi primer post
            |   *$post->url = str_slug($post->title);
            |       *str_slug() Es un Helper de Laravel que convierte cadenas en "rutas amigables"
            |           *Ejemplo: Esto: "Mi primer post" por esto: "mi-primer-post"
            |-------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        /* 
            |-------------------------------------------------------------------------------------
            | *Mi segundo post
            |   *$post->url = str_slug($post->title);
            |       *str_slug() Es un Helper de Laravel que convierte cadenas en "rutas amigables"
            |           *Ejemplo: Esto: "Mi segundo post" por esto: "mi-segundo-post"
            |-------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        /* 
            |-------------------------------------------------------------------------------------
            | *Mi tercer post
            |   *$post->url = str_slug($post->title);
            |       *str_slug() Es un Helper de Laravel que convierte cadenas en "rutas amigables"
            |           *Ejemplo: Esto: "Mi tercer post" por esto: "mi-tercer-post"
            |-------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->save();
    }
}


/* Notas:
    | -------------------------------------------------------
    | *Más información sobre str_slug()
    |   *https://laravel.com/docs/5.2/helpers#method-str-slug
    | -------------------------------------------------------
*/
