
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Crear usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\users\index.blade.php`
2. Edición de la vista `resources\views\admin\users\create.blade.php`
3. Edición de la vista `resources\views\admin\users\edit.blade.php`
4. Creación del directorio `resources\views\admin\roles`
   - Creación y edición de la vista `resources\views\admin\roles\checkboxes.blade.php`
5. Creación del directorio `resources\views\admin\permissions`
   - Creación y edición de la vista `resources\views\admin\permissions\checkboxes.blade.php`
6. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `create()`
   - Edición de la función `store(Request $request)`
     
     **No olvidar importar el modelo `use App\User;`*
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Introduction csrf protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- NOTA: En el curso mostraba un error si no se seleccionaban roles o permisos, en mi proyecto no aparecía ese error pero se hizo como en el curso para referencia
  - Más información en `app\Http\Controllers\Admin\UsersController.php`
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `resources\views\admin\users\index.blade.php`
- Más información en `resources\views\admin\users\create.blade.php`
- Más información en `resources\views\admin\users\edit.blade.php`
- Más información en `resources\views\admin\roles\checkboxes.blade.php`
- Más información en `resources\views\admin\permissions\checkboxes.blade.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
<!-- end information -->