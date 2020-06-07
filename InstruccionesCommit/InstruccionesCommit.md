
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Filtrar posts por etiqueta__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\welcome.blade.php`
2. Edición del archivo de estilos `public\css\style.css`
3. Edición del archivo de rutas `routes\web.php`
4. Creación y edición del controlador `app\Http\Controllers\TagsController.php`
   > php artisan make:controller TagsController
   - Creación y edición de la función `show(Tag $tag)`
     
     **No olvidar importar el modelo `use App\Tag;`*
5. Edición del modelo `app\Tag.php`
   - Creación y edición de la función `getRouteKeyName()`
   - Creación y edición de la relación `posts()`
6. Edición del controlador `app\Http\Controllers\CategoriesController.php`
   - Edición de la función `show(Category $category)`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación - `Customizing The Key Name`](https://laravel.com/docs/5.4/routing#implicit-binding)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `resources\views\welcome.blade.php`

- Más información en `routes\web.php`

- Más información en `app\Http\Controllers\TagsController.php`

- Más información en `app\Tag.php`

- Más información en `app\Http\Controllers\CategoriesController.php`
<!-- end information -->