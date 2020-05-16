<?php

use App\Tag;
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
            | ---------------------------------------------------------------------------------------------
            | *Tag::truncate(); El ejecutar los seeds se borra la infrmación para evitar duplicar registros
            | *No olvidar importar el modelo use App\Tag;
            | ---------------------------------------------------------------------------------------------
        */
        Post::truncate();
        Category::truncate();
        Tag::truncate();

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
            |-----------------------------------------------------------------------------------------------------------------
            | *Mi primer post
            | *$post->tags()->attach(Tag::create(['name' => 'Etiqueta 1'])); Le añade una etiqueta (etiqueta 1) al primer post
            |-----------------------------------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));

        /* 
            |------------------------------------------------------------------------------------------------------------------
            | *Mi segundo post
            | *$post->tags()->attach(Tag::create(['name' => 'Etiqueta 2'])); Le añade una etiqueta (etiqueta 2) al segundo post
            |------------------------------------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));

        /* 
            |-----------------------------------------------------------------------------------------------------------------
            | *Mi tercer post
            | *$post->tags()->attach(Tag::create(['name' => 'Etiqueta 3'])); Le añade una etiqueta (etiqueta 3) al tercer post
            |-----------------------------------------------------------------------------------------------------------------
        */
        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug($post->title);
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));
    }
}
