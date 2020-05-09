
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Personalizando el menú y utilizando controladores__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\layout.blade.php`
2. Creación del directorio `resources\views\admin\partials`
   - Creación y edición de la vista `resources\views\admin\partials\nav.blade.php`
3. Creación del directorio `resources\views\admin\posts`
   - Creación y edición de la vista `resources\views\admin\posts\index.blade.php`
4. Creación del controlador `app\Http\Controllers\HomeController.php`
   > php artisan make:controller HomeController

   **Al usar el comando `php artisan make:auth` se genera este controlador pero para este proyecto se hizo de diferente forma*
   - Creación y edición de la función `__construct()`
     
     **Esta función se ejecuta antes que cualquier otra función en el controlador*

     **Aquí se define que funciones son accesibles por el usuario (en esta caso ninguna, para acceder se debe estar autenticado)*
   - Creación y edición de la función `index()`
5. Creación y edición del controlador `app\Http\Controllers\PagesController.php`
   > php artisan make:controller PagesController

   **No olvidar importar el modelo `use App\Post`*
6. Creación y edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   > php artisan make:controller Admin/PostsController

   **Si no existe el directorio `app\Http\Controllers\Admin` Laravel lo crea*
   - Creación y edición de la función `index()`
6. Edición del archivo de rutas `routes\web.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Más información sobre `middlewares`](https://laravel.com/docs/5.4/middleware#introduction)
- Los middlewares dentro del proyecto se registran en `app\Http\Kernel.php`
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `resources\views\admin\layout.blade.php`

- Más información en `app\Http\Controllers\HomeController.php`

- Más información en `app\Http\Controllers\PagesController.php`

- Más información en `routes\web.php`
<!-- end information -->