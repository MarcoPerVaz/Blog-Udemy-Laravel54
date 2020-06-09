<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
        return $this->belongsToMany(Post::class);
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
