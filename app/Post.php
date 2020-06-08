<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /* 
        | -----------------------------------------------------------------------------------------------------------------------------
        | *La propiedad $fillable permite indicarle a Laravel que campos pueden ser almacenados en la base de datos e ignorar los demás
        |   *Más información sobre la propiedad $fillable en https://laravel.com/docs/5.4/eloquent#mass-assignment
        | -----------------------------------------------------------------------------------------------------------------------------
    */
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id',
    ];

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

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    /* 
        | ---------------------------------------------------------------------------------------
        | *Mutador o mutator 
        |   *Más información en https://laravel.com/docs/5.4/eloquent-mutators#defining-a-mutator
        | *Los mutadores se ejecutan automáticamente
        | ---------------------------------------------------------------------------------------
    */
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ?  Carbon::parse($published_at) : null;;
    }

    /* 
        | ---------------------------------------------------------------------------------------
        | *Mutador o mutator 
        |   *Más información en https://laravel.com/docs/5.4/eloquent-mutators#defining-a-mutator
        | *Los mutadores se ejecutan automáticamente
        | ---------------------------------------------------------------------------------------
    */
    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;;
    }

    /* 
        | -------------------------------------------------------------------------------------------------------
        | *Función para guardar las etiquetas que antes estaba en la función update(Post $post, Request $request) 
        |  del controlador app\Http\Controllers\Admin\PostsController.php
        | *Se crea una colección
        |   *Más información sobre colleciones en https://laravel.com/docs/5.4/collections#introduction
        | -------------------------------------------------------------------------------------------------------
    */
    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}
