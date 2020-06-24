<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Mail\LoginCredentials;
use Illuminate\Support\Facades\Mail;
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
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Mail En Laravel es para mandar un email
        | *to Es para darle el destinatario, en este caso se envia todo el objeto $user, que a su vez es recibido com parámetro en la función del archivo app\Events\UserWasCreated.php
        |  y también lo recibe en UserWasCreated::dispatch($user, $data['password']);de la función store(Request $request) del controlador app\Http\Controllers\Admin\UsersController.php
        | *Se recomienda siempre usar ->queue() para enviar el email a tráves de queues o colas y permite responder más rápido al usuario
        |  también se podría usar ->send(), pero se recomienda siempre usar queue()
        | *new LoginCredentials Es una nueva instancia del email que enviaremos
        | *No olvidar importar use Illuminate\Support\Facades\Mail;
        | *No olvidar importar use App\Mail\LoginCredentials;
        | *$event->user Obtiene el usuario y se lo pasa a la función __construct() del archivo app\Mail\LoginCredentials.php
        | *$event->password Obtiene el password y se lo pasa a la función __construct() del archivo app\Mail\LoginCredentials.php
        | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function handle(UserWasCreated $event)
    {
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );
    }
}
