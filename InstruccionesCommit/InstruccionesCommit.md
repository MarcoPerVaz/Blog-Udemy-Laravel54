
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Implementando Seeders__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Creación y edición del seeder `database\seeds\PostsTableSeeder.php`
   > php artisan make:seeder PostsTableSeeder

   **No olvidar importar use `App\Post;`*

   **No olvidar importar use `App\Category;`*

   ***Si se usa Carbon no olvidar importar la librería Carbon `use Carbon\Carbon;`*
2. Edición del archivo `database\seeds\DatabaseSeeder.php`
3. Ejecutar los seeds
   > php artisan db:seed
4. De querer ejecutar las migraciones junto con los seeds
   > php artisan migrate --seed
5. De querer rehacer las migraciones junto con los seeds
   > php artisan migrate:refresh --seed
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Librería Carbon](https://carbon.nesbot.com/docs/)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `database\seeds\PostsTableSeeder.php`

- Más información en `database\seeds\DatabaseSeeder.php`
<!-- end information -->