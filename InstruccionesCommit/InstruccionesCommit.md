
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Eventos y Listeners__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo `app\Providers\EventServiceProvider.php`
2. Creación de los archivos `app\Events\UserWasCreated.php` y `app\Listeners\SendLoginCredentials.php`
   > php artisan event:generate
     
     **Los directorios `app\Events` y `app\Listeners``se crean automáticamente si no existen al usar el comando*

     **Los archivos nuevos se crean a partir de la información en la propiedad `$listen` en `app\Providers\EventServiceProvider.php`*
   - Edición del archivo `app\Events\UserWasCreated.php`
     - Edición de la función constructor ` __construct`
     - Eliminación de la función `broadcastOn()`
3. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `store(Request $request)`
     
     **No olvidar importar `use App\Events\UserWasCreated;`*
4. Edición del archivo `app\Listeners\SendLoginCredentials.php`
   - Eliminación de la función `__construct()`
   - Edición de la función `handle(UserWasCreated $event)`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Providers\EventServiceProvider.php`
- Más información en `app\Events\UserWasCreated.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `app\Listeners\SendLoginCredentials.php`
<!-- end information -->