
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Reestructuración de código y activación de links__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del controlador `app\Http\Controllers\Auth\LoginController.php`
   - Edición de la propiedad `protected $redirectTo = '/home';`
2. Edición del middleware `app\Http\Middleware\RedirectIfAuthenticated.php`
   - Edición de la función `handle($request, Closure $next, $guard = null)`
3. Renombrar el controlador `app\Http\Controllers\HomeController.php` por `app\Http\Controllers\AdminController.php`
4. Edición del controlador `app\Http\Controllers\AdminController.php`
   - Esto `class HomeController extends Controller` por esto: `class AdminController extends Controller`
5. Mover el controlador `app\Http\Controllers\AdminController.php` a `app\Http\Controllers\Admin\AdminController.php`
   
   **No olvidar importar el namespace `namespace App\Http\Controllers\Admin;`*

   **No olvidar importar `use App\Http\Controllers\Controller;`*
6. Edición del archivo de rutas `routes\web.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`

- Más información en `resources\views\admin\partials\nav.blade.php`
<!-- end information -->