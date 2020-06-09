<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];

    /* 
        | -----------------------------------------------------------------------------------------------------------------------------------------------------
        | *Esta función reemplaza a eliminar la imagen desde la función destroy(Photo $photo) en el controlador app\Http\Controllers\Admin\PhotosController.php
        | *Evento deleting() de Eloquent
        | *Elimina las imágenes físicamente del proyecto
        | *No olvidar importar use Illuminate\Support\Facades\Storage;
        | -----------------------------------------------------------------------------------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($photo) {
            Storage::disk('public')->delete(str_replace('storage/', '', $photo->url));
        });
    }
}


/* Notas:
    | -------------------------------------------------------------------------------------------
    | *deleting() es un evento de Eloquent
    |   *Más información sobre eventos de Eloquent - https://laravel.com/docs/5.4/eloquent#events
    | -------------------------------------------------------------------------------------------
*/
