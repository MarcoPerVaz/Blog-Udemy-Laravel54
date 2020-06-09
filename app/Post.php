<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id',
    ];

    protected $dates = ['published_at'];

    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Evento para eliminar las imágenes de la base de datos
        |   *Más información en https://laravel.com/docs/5.4/eloquent#events
        | *$post->tags()->detach(); Elimina las etiquetas a tráves de la relación tags() en el modelo app\Post.php
        |   *Más información sobre detach en https://laravel.com/docs/5.4/eloquent-relationships#updating-many-to-many-relationships
        | *$post->photos->each->delete(); Recorre todas las fotos usando colecciones y las elimina de la base de datos usando la relación photos() del modelo app\Post.php
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {

            $post->tags()->detach();
            $post->photos->each->delete();

        });
    }

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
