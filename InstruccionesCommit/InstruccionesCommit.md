
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Mostrando el listado de roles__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo de rutas `routes\web.php`
2. Creación y edición del controlador `app\Http\Controllers\Admin\RolesController.php`
   > php artisan mak:controller Admin/RolesController -r
     
     **`-r` Indica a Laravel que se quiere crear un controlador con los 7 métodos REST (index, create, store, show, edit, update y destroy)*
   - Edición de la función `index()`
     
     **No olvidar importar el modelo `use Spatie\Permission\Models\Role;`*
3. Creación y edición de la vista `resources\views\admin\roles\index.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `CSRF protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- [Documentación | `Spoofing Form Methods`](https://laravel.com/docs/5.5/controllers#resource-controllers)
- [Documentación | `Stacks`](https://laravel.com/docs/5.5/blade#stacks)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`
<!-- end information -->