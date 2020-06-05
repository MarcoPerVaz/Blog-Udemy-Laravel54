<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
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

    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------
        | *Función que elimina imágenes
        | *$photo->delete(); Elimina la imagen de la base de datos
        | *$photoPath = str_replace('storage', 'public', $photo->url); Remplaza la url de la imagen (storage por public)
        | *Storage::delete($photoPath); Elimina físicamente la imagen del proyecto
        | * return back()->with('flash', 'Foto eliminada'); Retorna a la página anterior con el mensaje en la variable de sesión 'Foto eliminada'
        | ---------------------------------------------------------------------------------------------------------------------------------------
    */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);
        return back()->with('flash', 'Foto eliminada');
    }
}
