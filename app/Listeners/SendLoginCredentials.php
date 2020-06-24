<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    /* 
        | ------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Prueba para comprobar si funciona el evento que enviará el email al crear un usuario
        |   *dd($event->user->toArray(), $event->password);
        |       *$event->user->toArray() Muestra un array con los dats del usuario creado, roles si alguno es seleccionado y permisos si algunos son seleccionados
        |       *$event->password Muestra el password aleatorio generado por $data['password'] = str_random(8); en la función store(Request $request) del 
        |        controlador app\Http\Controllers\Admin\UsersController.php
        |   *Después de probar la información con dd() se crea el usuario en la base de datos ya que es el flujo normal de la aplicación, enviar el email y crear el usuario
        | ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function handle(UserWasCreated $event)
    {
        dd($event->user->toArray(), $event->password);

        // Enviar el email con las credenciales del usuario
    }
}


/* Notas:
    | ---------------------------------------------------------------------------------
    | *Se elimina la función __construct() que viene por defecto porque no se va a usar
    | ---------------------------------------------------------------------------------
*/
