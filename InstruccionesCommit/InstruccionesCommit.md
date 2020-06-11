
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Activando la navegación__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo de rutas `routes\web.php`
2. Edición de la vista `resources\views\layout.blade.php`
3. Creación y edición de la vista `resources\views\partials\nav.blade.php`
4. Edición del controlador `app\Http\Controllers\PagesController.php`
   - Edición de la función `home()`
   - Creación y edición de la función `about()`
   - Creación y edición de la función `archive()`
   - Creación y edición de la función `contact()`
5. Crear el directorio `resources\views\pages`
   - Creación y edición de la vista `resources\views\pages\about.blade.php`
   - Creación y edición de la vista `resources\views\pages\archive.blade.php`
   - Creación y edición de la vista `resources\views\pages\contact.blade.php`
6. Renombrar y mover la vista `resources\views\welcome.blade.php` por `resources\views\pages\home.blade.php`
7. Creación y edición del helper `app\Http\helpers.php`
8. Edición del archivo `composer.json`

   **Se agrega `"files": ["app/Http/helpers.php"]` en la línea 25*
9. Usar el comando para que composer reconozca al helper `app\Http\helpers.php`
   > composer dumpautoload -o

   **`-o` significa: Optimizes PSR0 and PSR4 packages to be loaded with classmaps too, good for production.*
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `dump-autoload (dumpautoload)`](https://getcomposer.org/doc/03-cli.md#dump-autoload-dumpautoload-)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`
- Más información en `resources\views\layout.blade.php`
- Más información en `resources\views\partials\nav.blade.php`
- Más información en `app\Http\Controllers\PagesController.php`
- Más información en `resources\views\pages\about.blade.php`
- Más información en `resources\views\pages\archive.blade.php`
- Más información en `resources\views\pages\contact.blade.php`
- Más información en `app\Http\Helpers.php`
<!-- end information -->