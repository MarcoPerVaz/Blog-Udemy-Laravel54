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
        | -----------------------------------------------------------------------------------------------------------------------------
        | *$post->photos() Es una función en el modelo app\Post.php
        | *Se usa una forma distinta en el curso para ver y guardar la imagen en la base de datos
        |   *Para guardar la imagen en la base de datos en el curso se usa 'url' => request()->file('photo')->store('posts', 'public'),
        |   *Para este proyecto se usa 'url' => Storage::url(request()->file('photo')->store('posts', 'public')),
        | -----------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048',
        ]);

        $post->photos()->create([
            'url' => Storage::url(request()->file('photo')->store('posts', 'public')),
        ]);
    }

    /* 
        | -------------------------------------------------------------
        | *La eliminación de imágenes fue pasado al modelo app\Post.php
        | -------------------------------------------------------------
    */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with('flash', 'Foto eliminada');
    }
}


/* Notas:
    | --------------------------------------------------------------------------------------------------------------
    | *Se tuvo que hacer modificaciones porque en el curso se usaba diferente el como guardar y mostrar las imágenes
    |   *Para visualizar la imagen en la url en el curso se usa /posts/imagen.jpg
    |   *Para visualizar la imagen en el proyecto se usa /storage/posts/imagen.jpg
    | --------------------------------------------------------------------------------------------------------------
*/
