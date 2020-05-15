
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Generando url's amigables__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del controlador `app\Http\Controllers\PostsController.php`
   - Edición de la función `show($id)`
2. Edición del archivo de rutas `routes\web.php`
3. Edición del modelo `app\Post.php`
   - Creación y edición de la función `getRouteKeyName()`
4. Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
5. Edición del archivo seeder `database\seeds\PostsTableSeeder.php`
6. Rehacer las migraciones junto con los seeds
   > php artisan migrate:refresh --seed
7. Edición de la vista `resources\views\welcome.blade.php`
8. Crear un usuario con `Tinker`
   > php artisan tinker

   > $user = new App\User;

   > $user->name = "Marco"

   > $user->email = "admin@mail.com"

   > $user->password = bcrypt('123456')

   > $user->save()

   > exit
9. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `store(Request $request)`
10. Crear 2 etiquetas de forma manual en la tabla `tags` de la base de datos
11. Se crearon 4 registros de forma manual de `post_id` y `tag_id` en la tabla `post_tag` para asignarle etiquetas a los 3 posts existentes
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\PostsController.php`

- Más información en `routes\web.php`

- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`

- Más información en `database\seeds\PostsTableSeeder.php`

- Más información en `app\Http\Controllers\Admin\PostsController.php`
<!-- end information -->