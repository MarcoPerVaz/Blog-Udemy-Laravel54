
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
1. Edición de la vista `resources\views\welcome.blade.php`
2. Creación y edición del controlador `app\Http\Controllers\PostsController.php`
   > php artisan make:controller PostsController

   **Este controlador sirve para cuando el usuario no ha iniciado sesión*
   - Creación y edición de la función `show($id)`
     
     **No olvidar importar el modelo `use App\Post;`*
3. Creación del directorio `resources\views\posts`
   - Creación y edición de la vista `resources\views\posts\show.blade.php`
     - Copiar el contenido de `single-post.html`del directorio `Zendero` (se puede descargar de los recursos del curso o si ya se tiene en la computadora, pues desde ahí)
     - Edición de la vista `resources\views\posts\show.blade.php` para adaptarla al proyecto
4. Creación del directorio `resources\views\partials`
   - Creación y edición de la vista `resources\views\partials\disqus-script.blade.php`
5. Edición del archivo de rutas `routes\web.php`
**No se mostraban los estilos de la vista `resources\views\posts\show.blade.php`*
6. Edición de la vista `resources\views\layout.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- No se mostraban los estilos de la vista `resources\views\posts\show.blade.php` por lo que se tuvo que editar la vista `resources\views\layout.blade.php`
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\PostsController.php`

- Más información en `resources\views\posts\show.blade.php`

- Más información en `routes\web.php`

- Más información en `resources\views\layout.blade.php`
<!-- end information -->