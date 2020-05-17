<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------
        | *Función que guardará las imagenes asociadas al post
        | *$this->validate() Validación para imágenes
        | *'required|image|max:2048'
        |   *El campo 'photo' es obligatorio, debe ser de tipo imagen y el tamaño máximo por cada imagen es de 2 MB
        | *request()->file('photo'); Gracias a que en la vista resources\views\admin\posts\edit.blade.php se usa la propiedad paramName: 'photo',
        |  se puede usar 'photo' en lugar de lo que dropzone trae por defecto que es 'file'
        | ---------------------------------------------------------------------------------------------------------------------------------------
    */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048',
        ]);
        $photo = request()->file('photo');
    }
}
