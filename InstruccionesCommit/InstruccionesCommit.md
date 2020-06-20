
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Agregar y quitar roles de usuario__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `edit(User $user)`
     
     **No olvidar importar el modelo `use Spatie\Permission\Models\Role;`*
2. Edición de la vista `resources\views\admin\users\edit.blade.php`
3. Creación y edición del controlador `app\Http\Controllers\Admin\UsersRolesController.php`
   > php artisan make:controller Admin/UsersRolesController -r
     
     **`-r` Crea 7 funciones REST de forma automática (index, create, store, show, edit, update y destroy)*

     ***Al final solo se deja la función `update(Request $request, $id)` y se borran las demás funciones
   - Edición de la función `update(Request $request, $id)`
     

     **No olvidar importar el modelo `use App\User;`*
4. Edición del archivo de rutas `routes\web.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `pluck()`](https://laravel.com/docs/5.5/collections#method-pluck)
- [Documentación | `Introduction csrf protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- [Documentación | `Spoofing Form Methods`](https://laravel.com/docs/5.5/controllers#resource-controllers)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `resources\views\admin\users\edit.blade.php`
- Más información en `app\Http\Controllers\Admin\UsersRolesController.php`
- Más información en `routes\web.php`
<!-- end information -->