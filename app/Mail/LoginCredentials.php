<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginCredentials extends Mailable
{
    use Queueable, SerializesModels;

    /* 
        | ----------------------------------------------------------------
        | *public $user; Variable pública para el nombre del usuario
        | *public $password; Variable pública para el password del usuario
        | ----------------------------------------------------------------
    */
    public $user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /* 
        | ------------------------------------------------------------------------------------------------------------------------------
        | *__construct($user, $password) Se pasan como parámetro las 2 variables públicas $user y $password como parámetro en la función
        | *$this->user = $user; Se asigna lo que tenga la variable $user a la variable pública public $user
        | *$this->password = $password; Se asigna lo que tenga la variable $password a la variable pública public $password
        | ------------------------------------------------------------------------------------------------------------------------------
    */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *Devuelve la vista en lenguaje markdown resources\views\emails\login-credentials.blade.php
        | *->subject() El asunto del email
        | *config('app.name') Obtiene el nombre a partir de 'name' => env('APP_NAME', 'Zendero'), en el archivo config\app.php
        |   *env('APP_NAME', 'Zendero') Obtiene el nombre de APP_NAME=Zendero en el archivo .env y si no existe coloca por defecto 'Zendero'
        | ----------------------------------------------------------------------------------------------------------------------------------
    */
    public function build()
    {
        return $this->markdown('emails.login-credentials')
            ->subject('Tus credenciales de acceso a ' . config('app.name'));
    }
}
