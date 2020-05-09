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
        /* 
            | ------------------------------------------------------------------------------------------------------------------------
            | *Post::truncate(); Borra los registros de la tabla 'posts' y vuelve a crear los registros (Evita duplicaciones)
            | *Category::truncate(); Borra los registros de la tabla 'categories' y vuelve a crear los registros (Evita duplicaciones)
            | *Se crean 2 categorías
            | *Se crean 3 posts
            | *No olvidar importar use App\Post;
            | *No olvidar importar use App\Category;
            | *No olvidar importar la librería Carbon use Carbon\Carbon;
            | ------------------------------------------------------------------------------------------------------------------------
        */
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
            |------------------------------------------------------------------
            | *Mi primer post
            |   *Carbon::now()->subDays(4); Fecha 4 días antes de la fecha actual
            |   *category_id = 1; Le indica el id de la categoría (Categoría 1)
            |------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi primer post";
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        /* 
            |--------------------------------------------------------------------
            | *Mi segundo post
            |   *Carbon::now()->subDays(3); Fecha 3 días antes de la fecha actual
            |   *category_id = 2; Le indica el id de la categoría (Categoría 2)
            |--------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi segundo post";
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        /* 
            |--------------------------------------------------------------------
            | *Mi tercer post
            |   *Carbon::now()->subDays(2); Fecha 2 días antes de la fecha actual
            |   *category_id = 1; Le indica el id de la categoría (Categoría 1)
            |--------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi tercer post";
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->save();
    }
}


/* Notas:
    | -----------------------
    | *Más información sobre la librería Carbon
    |   *https://carbon.nesbot.com/docs/
    | -----------------------
*/
