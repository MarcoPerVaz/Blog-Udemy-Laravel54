
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Reestructuración de Admin/PhotosController__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del controlador `app\Http\Controllers\Admin\PhotosController.php`
   - Edición de la función `store(Post $post)`
   - Edición de la función `destroy(Photo $photo)`
2. Edición de la vista `resources\views\posts\show.blade.php`
3. Edición del modelo `app\Photo.php`
   - Creación y edición de la función `boot()`
     
     **No olvidar importar `use Illuminate\Support\Facades\Storage;`*
4. Edición del archivo seed `database\seeds\PostsTableSeeder.php`

   **No olvidar importar `use Illuminate\Support\Facades\Storage;`*
   - > php artisan migrate:refresh --seed
       
       **Para comprobar si se elimina el directorio `storage\app\public\posts` y el directorio `public\storage\posts` (Si se eliminan)*
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Events Eloquent`](https://laravel.com/docs/5.4/eloquent#events)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\Admin\PhotosController.php`

- Más información en `app\Photo.php`

- Más información en `database\seeds\PostsTableSeeder.php`
<!-- end information -->