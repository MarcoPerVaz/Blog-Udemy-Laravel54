<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /* 
        | ---------------------------------------------------------------------------------------------------------------------
        | *Laravel por defecto devuelve el id del registro para cambiarlo se sobreescribe la función original getRouteKeyName()
        |   *Más información en Customizing The Key Name - https://laravel.com/docs/5.4/routing#implicit-binding
        | ---------------------------------------------------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /* 
        | ---------------------------------------------------------------------------------------
        | *Mutador o mutator 
        |   *Más información en https://laravel.com/docs/5.4/eloquent-mutators#defining-a-mutator
        | *Los mutadores se ejecutan automáticamente
        | *La función str_slug() de Laravel permite tranformar cadenas en url's amigables
        |   *Más información en https://laravel.com/docs/7.x/helpers#method-str-slug
        | ---------------------------------------------------------------------------------------
    */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}


/* Notas:
    | ------------------------------------------------------
    | *Relaciones con Eloquent
    |   *https://laravel.com/docs/5.4/eloquent-relationships
    | ------------------------------------------------------
*/
