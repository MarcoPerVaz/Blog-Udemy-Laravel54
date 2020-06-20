
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Agregar y quitar permisos de usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\users\edit.blade.php`
2. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `edit(User $user)`

     **No olvidar importar el modelo `use Spatie\Permission\Models\Permission;`*
3. Edición del archivo de rutas `routes\web.php`
4. Creación y edición del controlador `app\Http\Controllers\Admin\UsersPermissionsController.php`
   > php artisan make:controller Admin/UsersPermissionsController
   - Creación y edición de la función `update(Request $request, User $user)`
     
     **No olvidar importar el modelo `use App\User;`*
5. Edición del controlador `app\Http\Controllers\Admin\UsersRolesController.php`
   - Edición de la función `update(Request $request, User $user)`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Introduction csrf protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- [Documentación | `Spoofing Form Methods`](https://laravel.com/docs/5.5/controllers#resource-controllers)
- [Documentación | `pluck()`](https://laravel.com/docs/5.5/collections#method-pluck)
- En el curso hubo un error al dejar roles y permisos vacios, yo no tuve el error pero agregue las 2 formas como referencia
  - Más información en `app\Http\Controllers\Admin\UsersPermissionsController.php`
  - Más información en `app\Http\Controllers\Admin\UsersRolesController.php`
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `resources\views\admin\users\edit.blade.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `routes\web.php`
- Más información en `app\Http\Controllers\Admin\UsersPermissionsController.php`
<!-- end information -->