
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Almacenando las imágenes en la base de datos__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\posts\index.blade.php`
2. Edición del archivo de rutas `routes\web.php`
3. Edición del controlador `app\Http\Controllers\Admin\PhotosController.php`
   - Edición de la función `store(Post $post)`

     **No olvidar importar el modelo `use App\Photo;`

     **No olvidar importar importar `use Illuminate\Support\Facades\Storage;`*
4. Crear un enlace símbolico del directorio `storage` al directorio `public`
   > php artisan storage:link
5. Edición del archivo `readme.md`
6. Edición de la migración `database\migrations\2020_05_17_102027_create_photos_table.php`
7. Rehacer las migraciones y los seeds
   > php artisan migrate:refresh --seed
8. Edición del modelo `app\Photo.php`
9. Edición del modelo `app\Post.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- Más información sobre el directorio `storage` y el comando `php artisan storage:link`
  - https://laravel.com/docs/5.4/structure#the-storage-directory
- [Eloquent: Relationships](https://laravel.com/docs/5.4/eloquent-relationships)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`

- Más información en `app\Http\Controllers\Admin\PhotosController.php`

- Más información en `database\migrations\2020_05_17_102027_create_photos_table.php`

- Más información en `app\Photo.php`

- Más información en `app\Post.php`
<!-- end information -->