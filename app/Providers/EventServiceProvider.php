<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    /* 
        | -------------------------------------------------------------------------------------------------------------------------------------
        | *Al usar el comando php artisan event:generate
        |   *Se crea los archivos app\Events\UserWasCreated.php y app\Listeners\EventListener.php que son los que están en la propiedad $listen
        | *'App\Events\UserWasCreated' Cuando el usuario es creado
        | *'App\Listeners\SendLoginCredentials', Envía las credenciales vía email
        | -------------------------------------------------------------------------------------------------------------------------------------
    */
    protected $listen = [
        'App\Events\UserWasCreated' => [
            'App\Listeners\SendLoginCredentials',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
