
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Creando las etiquetas__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Creación del modelo `app\Tag.php` junto a su migración `ddatabase\migrations\2020_05_09_174944_create_tags_table.php`
   > php artisan make:model Tag -m
   - Edición de la migración `ddatabase\migrations\2020_05_09_174944_create_tags_table.php`
2. Creación y edición de la migración `database\migrations\2020_05_09_175109_create_post_tag_table.php`
   > php artisan make:migration create_post_tag_table --create=post_tag

   **Esta migración es para guardar los id de los posts y los id de los tags (relación belongToMany)*
3. Ejecutar las migraciones
   > php artisan migrate
4. Se crean 2 etiquetas de forma manual en la tabla `tags`
5. Edición del modelo `app\Post.php`
   - Creación y edición de la función `tags()` relación belongsToMany
6. Se crearon 4 registros de forma manual de `post_id` y `tag_id` en la tabla `post_tag` para asignarle etiquetas a los 3 posts existentes
7. Edición de la vista `resources\views\welcome.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `ddatabase\migrations\2020_05_09_174944_create_tags_table.php`

- Más información en `database\migrations\2020_05_09_175109_create_post_tag_table.php`

- Más información en `app\Post.php`

- Más información en `resources\views\welcome.blade.php`
<!-- end information -->