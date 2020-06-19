
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Creando el perfil de usuario__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\users\index.blade.php`
2. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `show($id)`
3. Creación y edición de la vista `resources\views\admin\users\show.blade.php`
4. Edición de la vista `resources\views\admin\layout.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- Hay un error en la vista `resources\views\admin\layout.blade.php` en el menú de cerrar sesión, si el usuario no tiene roles asignados muestra el error *Trying to get property 'name' of non-object*, la solución se muestra en la vista `resources\views\admin\layout.blade.php`, la solución no la incluye el curso, así que tuve que hacerla yo
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `resources\views\admin\users\show.blade.php`
- Más información en `resources\views\admin\layout.blade.php`
<!-- end information -->