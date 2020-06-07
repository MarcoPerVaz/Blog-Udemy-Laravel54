
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Filtrar posts por categoría__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Creación y edición del controlador `app\Http\Controllers\CategoriesController.php`
   > php artisan make:controller CategoriesController
   - Creación y edición de la función `show(Category $category)`
     
     **No olvidar importar el modelo `use App\Category;`*
2. Eliminación de la vista `resources\views\home.blade.php`
3. Edición del archivo de rutas `routes\web.php`
4. Edición del modelo `app\Category.php`
   - Creación y edición de la función `getRouteKeyName()`
   - Creación y edición de la relación `posts()`
   
     **No olvidar importar el modelo `use App\Post;`*
5. Edición de la vista `resources\views\welcome.blade.php`
6. Edición del archivo de estilos `public\css\style.css`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación - `Customizing The Key Name`](https://laravel.com/docs/5.4/routing#implicit-binding)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Controllers\CategoriesController.php`

- Más información en `routes\web.php`

- Más información en `app\Category.php`

- Más información en `resources\views\welcome.blade.php`
<!-- end information -->