
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Asignar posts a usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
2. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `store(Request $request)`
3. Edición del seeder `database\seeds\PostsTableSeeder.php`
4. Rehacer las migraciones con seeds
   > php artisan migrate:refresh --seed
5. Edición del modelo `app\Post.php`
6. Edición del modelo `app\User.php`
7. Edición de la vista `resources\views\pages\home.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Eloquent: Relationships`](https://laravel.com/docs/5.5/eloquent-relationships)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`
- Más información en `app\Http\Controllers\Admin\PostsController.php`
- Más información en `database\seeds\PostsTableSeeder.php`
- Más información en `app\Post.php`
- Más información en `app\User.php`
- Más información en `resources\views\pages\home.blade.php`
<!-- end information -->