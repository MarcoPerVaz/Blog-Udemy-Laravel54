<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserWasCreated
{
    use Dispatchable, SerializesModels;

    /* 
        | ----------------------------------------------------------------
        | *public $user; Variable pública para el nombre del usuario
        | *public $password; Variable pública para el password del usuario
        | ----------------------------------------------------------------
    */
    public $user;
    public $password;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    /* 
        | ------------------------------------------------------------------------------------------------------------------
        | *__construct($user, $password) Se inyectan las 2 variables públicas $user y $password como parámetro en la función
        | *$this->user = $user; Se asigna lo que tenga la variable $user a la variable pública public $user
        | *$this->password = $password; Se asigna lo que tenga la variable $password a la variable pública public $password
        | ------------------------------------------------------------------------------------------------------------------
    */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

}


/* Notas:
    | -------------------------------------------------------------------------------------------------------------------------------
    | *Se quita el trait use InteractsWithSockets de use Dispatchable, InteractsWithSockets, SerializesModels; porque no se va a usar
    | *Se quita la función public function broadcastOn() que viene por defecto porque no se va a utilizar
    | -------------------------------------------------------------------------------------------------------------------------------
*/
