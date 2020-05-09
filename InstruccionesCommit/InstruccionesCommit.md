
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Creando las categorías__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Creación del modelo `app\Category.php` junto a su migración `database\migrations\2020_05_09_172611_create_categories_table.php`
   > php artisan make:model Category -m
   - Edición de la migración `database\migrations\2020_05_09_172611_create_categories_table.php`
2. Ejecutar las migraciones
   > php artisan migrate
3. Edición del modelo `app\Post.php`
   - Creación y edición de la función `category()` relación belongsTo
4. Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
5. Rehacer las migraciones
   > php artisan migrate:refresh
6. Se crean 2 registros de forma manual en la tabla `posts`
7. Se crean 2 registros de forma manual en la tabla `categories`
8. Edición de la vista `resources\views\welcome.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Available Column Types](https://laravel.com/docs/5.4/migrations#creating-columns)
- [Eloquent: Relationships](https://laravel.com/docs/5.4/eloquent-relationships)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `database\migrations\2020_05_09_172611_create_categories_table.php`

- Más información en `app\Post.php`

- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`

- Más información en `resources\views\welcome.blade.php`
<!-- end information -->