
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Mostrando el listado de usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo de rutas `routes\web.php`
2. Creación y edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   > php artisan make:controller Admin/UsersController -r
     
     **`-r` Crea 7 funciones REST de forma automática (index, create, store, show, edit, update y destroy)*
     - Edición de la función `index()`
       
       **No olvidar importar el modelo `use App\User;`*
3. Creación del directorio `resources\views\admin\users`
   - Creación y edición de la vista `resources\views\admin\users\index.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Dcoumentación | `Introduction csrf protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- [Dcoumentación | `Spoofing Form Methods`](https://laravel.com/docs/5.5/controllers#resource-controllers)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `resources\views\admin\users\index.blade.php`
<!-- end information -->