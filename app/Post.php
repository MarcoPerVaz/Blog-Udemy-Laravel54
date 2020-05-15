<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    /* 
        | -------------------------------------------------------------------------------------------------
        | *getRouteKeyName() Sobreescribe la función original que devuelve el campo 'id' por el campo 'url'
        | *Rutas amigables
        |   *Esto: /post/3 por esto: /post/mi-post-3
        | *Más información en https://laravel.com/docs/5.4/routing#implicit-binding
        | -------------------------------------------------------------------------------------------------
    */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
              ->where('published_at', '<=', Carbon::now())
              ->latest('published_at');
    }
}


/* Notas:
    | -------------------------------------------------------------
    | *Más información sobre la protección contra asignación masiva
    |   *https://laravel.com/docs/5.4/eloquent#mass-assignment
    | -------------------------------------------------------------
*/
