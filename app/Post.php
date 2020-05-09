<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    /* 
        | -------------------------------------
        | *Relación belongsTo (Pertenece a) - Un post pertenece a una categoría
        | *Más información sobre belongsTo
        |   *https://laravel.com/docs/5.4/eloquent-relationships#one-to-many-inverse
        | *Para poder acceder a la relación
        |   *$post->category->name
        | -------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


/* Notas:
    | ------------------------------------------------------
    | *Más información sobre las relaciones de Eloquent
    |   *https://laravel.com/docs/5.4/eloquent-relationships
    | ------------------------------------------------------
*/
