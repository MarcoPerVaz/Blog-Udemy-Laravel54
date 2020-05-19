<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /* 
        | ------------------------------------------------------------
        | *Función que guardará las imagenes asociadas al post
        | *->store('public'); Guarda las imágenes en public
        | *Photo::create(); Crea un post con las imágenes
        | *No olvidar importar el modelo use App\Photo;
        | *No olvidar importar use Illuminate\Support\Facades\Storage;
        | ------------------------------------------------------------
    */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048',
        ]);
        $photo = request()->file('photo')->store('public');
        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);
    }
}
