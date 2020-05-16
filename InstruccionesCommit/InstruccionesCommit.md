
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Actualizar posts__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\posts\index.blade.php`
2. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Poner entre comentarios la función `create()`
   - Edición de la función `store(Request $request)`
   - Creación y edición de la función `edit(Post $post)`
   - Creación y edición de la función `update(Post $post, Request $request)`
3. Edición del archivo de rutas `routes\web.php`
4. Creación y edición de la vista `resources\views\admin\posts\edit.blade.php`
5. Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
6. Creación y edición del archivo seeder `php artisan make:seed UsersTableSeeder`
   
   **No olvidar importar el modelo `use App\User;`*
7. Edición del archivo `database\seeds\DatabaseSeeder.php`
8. Edición de la vista `resources\views\admin\posts\create.blade.php`
9. Edición del archivo seed `database\seeds\PostsTableSeeder.php`

    **No olvidar importar el modelo `use App\Tag;`*
10. Edición de la migración `database\migrations\2020_05_09_175109_create_post_tag_table.php`
11. Rehacer las migraciones junto con los seeds
    > php artisan migrate:refresh --seed
12. Edición de la vista `resources\views\admin\partials\nav.blade.php`
13. Edición de la vista `resources\views\admin\layout.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\Admin\PostsController.php`

- Más información en `routes\web.php`

- Más información en `resources\views\admin\posts\edit.blade.php`

- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`

- Más información en `database\seeds\UsersTableSeeder.php`

- Más información en `database\seeds\DatabaseSeeder.php`

- Más información en `resources\views\admin\posts\create.blade.php`

- Más información en `database\seeds\PostsTableSeeder.php`

- Más información en `resources\views\admin\layout.blade.php`
<!-- end information -->