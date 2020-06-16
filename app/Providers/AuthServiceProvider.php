<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    /* 
        | ---------------------------------------------------------------
        | *'App\Post' => 'App\Policies\PostPolicy',
        |   *'App\Post' Es el modelo
        |   *'App\Policies\PostPolicy' Es la ruta de la Policy o Política
        | ---------------------------------------------------------------
    */
    protected $policies = [
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}


/* Notas:
    | -------------------------------------------------------------------------------------
    | *Se registran las Policies o Políticas en la propiedad $policies
    |   *Más información en https://laravel.com/docs/5.5/authorization#registering-policies
    | -------------------------------------------------------------------------------------
*/
