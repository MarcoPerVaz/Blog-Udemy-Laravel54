<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

    /* 
        | -------------------------------------------------------------------------------------------------------------
        | *QueryScope que obtiene a todos los posts de forma descendente omitiendo los posts sin fecha(nulos) o futuros
        | *No olvidar importar la librería Carbon use Carbon\Carbon;
        | -------------------------------------------------------------------------------------------------------------
    */
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
