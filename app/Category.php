<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /* 
        | ----------------------------------------------------------------------------------------
        | *Deshabilita la protección contra asignación masiva(tener cuidado cuando se deshabilita)
        |   *Más información en https://laravel.com/docs/5.4/eloquent#mass-assignment
        | ----------------------------------------------------------------------------------------
    */
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}


/* Notas:
    | --------------------------------------------------------
    | *Mass Assignment
    |   *https://laravel.com/docs/5.4/eloquent#mass-assignment
    | --------------------------------------------------------
*/
