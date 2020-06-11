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

    /* 
        | --------------------------------
        | *Función para crear url's únicas
        | --------------------------------
    */
    public static function create(array $attributes = [])
    {
        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    /* 
        | --------------------------------------------------------------------------------------------------------------------------------------
        | *Función para convierte el nmbre del post en url's únicas y amigable y lo guarda en la base de datos
        | *Sustituye al mutator setTitleAttribute($title) que es eliminado
        | *$url = str_slug($this->title); Convierte el campo 'title' en slug y lo guarda en la variable $url
        | *if ($this::whereUrl($url)->exists()) Verficia si ya existe la url y de existir le agrega el campo 'id' - $url = "{$url}-{$this->id}";
        | *$this->url = $url; Asigna la url nueva al campo 'url' de la base de datos
        | *$this->save();¨Guarda el campo en la base de datos
        | --------------------------------------------------------------------------------------------------------------------------------------
    */
    public function generateUrl()
    {
        $url = str_slug($this->title);

        if ($this::whereUrl($url)->exists()) {
            $url = "{$url}-{$this->id}";
        }
        $this->url = $url;
        $this->save();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ?  Carbon::parse($published_at) : null;;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}
