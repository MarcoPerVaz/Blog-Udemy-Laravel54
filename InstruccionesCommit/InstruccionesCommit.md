
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Subir imágenes con DrozoneJs__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)

[Documentación oficial | `Dropzone Js` ](https://www.dropzonejs.com/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\posts\create.blade.php`
2. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `update(Post $post, Request $request)`
3. Edición de la vista `resources\views\admin\posts\edit.blade.php`
4. Creación del modelo `app\Photo.php` junto al controlador `app\Http\Controllers\PhotoController.php` y su migración `database\migrations\2020_05_17_102027_create_photos_table.php`
   > php artisan make:model Photo -mc
5. Edición del archivo de rutas `routes\web.php`
6. Renombrar el controlador `app\Http\Controllers\PhotoController.php` por `app\Http\Controllers\PhotosController.php`
7. Mover el controlador `app\Http\Controllers\PhotosController.php` a `app\Http\Controllers\Admin\PhotosController.php`
8. Edición del controlador `app\Http\Controllers\Admin\PhotosController.php`
   - Creación y edición de la función `store(Post $post)`

     **No olvidar importar el modelo `use App\Post;`*
     
**Nota: Para comprobar que todo funciona correctamente*
- Iniciar sesión
- Crear un nuevo post
- Adjuntar una imagen usando DropzoneJS
- En el navegador dar click derecho e inspeccionar elemento
- Ir a la sección Red
- Click en photos
- En las opciones de la derecha ir a la sección Respuesta
- Ver el texto pasado en la función store(Post $post) del controlador app\Http\Controllers\Admin\PhotosController.php 'Procesando imagen'
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [CDN | `DropzoneJS`](https://cdnjs.com/libraries/dropzone/5.0.1)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\Admin\PostsController.php`

- Más información en `app\Http\Controllers\PhotoController.php`

- Más información en `routes\web.php`
<!-- end information -->