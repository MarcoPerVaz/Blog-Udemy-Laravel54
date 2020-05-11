<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /* 
        | ----------------------------------------------------------------------------
        | *protected $guarded = []; Deshabilita la protección contra asiganción masiva
        | ----------------------------------------------------------------------------
    */
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}


/* Notas:
    | -------------------------------------------------------------
    | *Más información sobre la protección contra asignación masiva
    |   *https://laravel.com/docs/5.4/eloquent#mass-assignment
    | -------------------------------------------------------------
*/
