<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /* 
        | ---------------------------------------------------------------------------------------------------------------------
        | *Laravel por defecto devuelve el id del registro para cambiarlo se sobreescribe la función original getRouteKeyName()
        |   *Más información en Customizing The Key Name - https://laravel.com/docs/5.4/routing#implicit-binding
        | ---------------------------------------------------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /* 
        | -------------------------------------------------------------------------------------
        | *Relación belongsToMany(Pertenece a muchos)
        |   *Más informción en https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
        | *No olvidar importar el modelo use App\Post;
        | -------------------------------------------------------------------------------------
    */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}


/* Notas:
    | ------------------------------------------------------
    | *Relaciones con Eloquent
    |   *https://laravel.com/docs/5.4/eloquent-relationships
    | ------------------------------------------------------
*/
