
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Eliminar usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `update(UpdateUserRequest $request, User $user)`
   - Edición de la función `destroy($id)`
2. Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
3. Rehacer las migraciones con seeds
   > php artisan migrate:fresh --seed
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | ](https://laravel.com/docs/5.5/migrations#foreign-key-constraints)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`
<!-- end information -->