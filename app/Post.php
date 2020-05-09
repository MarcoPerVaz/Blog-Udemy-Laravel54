<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* 
        | -------------------------------------
        | *Relación belongsToMany (Pertenece a muchos) - Un post pertenece a muchas categorías
        | *Más información sobre belongsToMany
        |   *https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
        | *Para poder acceder a la relación
        |   *@foreach ($post->tags as $tag)
        |       {{ $tag->name }}
        |    @endforeach
        | -------------------------------------
    */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}


/* Notas:
    | ------------------------------------------------------
    | *Más información sobre las relaciones de Eloquent
    |   *https://laravel.com/docs/5.4/eloquent-relationships
    | ------------------------------------------------------
*/
