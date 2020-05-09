<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /* 
        | --------------------------------------------------------------------
        | *No olvidar importar la clase use Illuminate\Support\Facades\Schema;
        | --------------------------------------------------------------------
    */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}


/* Notas:
    | ---------------------------------------------------------------
    | *Schema::defaultStringLength(191); Asigna un tamaño por defecto
    | ---------------------------------------------------------------
*/
