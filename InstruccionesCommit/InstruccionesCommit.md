
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Accesores y mutadores de Eloquent__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del modelo `app\Category.php`
   - Edición de la función `getRouteKeyName()`
   - Creación y edición del mutator `setNameAttribute($name)`
2. Edición de la migración `database\migrations\2020_05_09_172611_create_categories_table.php`
3. Edición de la migración `database\migrations\2020_05_09_174944_create_tags_table.php`
4. Edición del modelo `app\Tag.php`
   - Edición de la función `getRouteKeyName()`
   - Creación y ediciól del mutator `setNameAttribute($name)`
5. Edición del modelo `app\Post.php`
   - Creación y edición del mutator `setTitleAttribute($title)`
6. Rehacer las migraciones con seeds
   > php artisan migrate:refresh --seed
7. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `store(Request $request)`
   - Edición de la función `update(Post $post, Request $request)`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Accessors & Mutators`](https://laravel.com/docs/5.4/eloquent-mutators#accessors-and-mutators)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Category.php`

- Más información en `database\migrations\2020_05_09_172611_create_categories_table.php`

- Más información en `database\migrations\2020_05_09_174944_create_tags_table.php`

- Más información en `app\Tag.php`

- Más información en `app\Post.php`

- Más información en `app\Http\Controllers\Admin\PostsController.php`
<!-- end information -->