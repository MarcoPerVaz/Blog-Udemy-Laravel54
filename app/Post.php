<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

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
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
              ->where('published_at', '<=', Carbon::now())
              ->latest('published_at');
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
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }
}
