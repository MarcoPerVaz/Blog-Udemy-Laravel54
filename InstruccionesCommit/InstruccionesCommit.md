
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Reestructuración de Admin/PostsController__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Creación y edición del form request `app\Http\Requests\StorePostRequest.php`

   **Si el directorio `app\Http\Requests` no existe Laravel lo crea automáticamente al usar el comando*
   - Edición de la función `authorize()`
   - Edición de la función `rules()`
2. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `update(Post $post, Request $request)`
     
     **No olvidar importar `use App\Http\Requests\StorePostRequest;`*
3. Edición del modelo `app\Post.php`
   - Creación y edición del mutador `setPublishedAtAttribute($published_at)`
   - Creación y edición del mutador `setCategoryIdAttribute($category)`
   - Creación y edición de la función `syncTags($tags)`
4. Edición de la vista `resources\views\admin\posts\edit.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- Los Form Requests se usan para almacenar las validaciones del lado del servidor, la recomendación es que si tu aplicación es pequeña entonces las validaciones vayan en la función en el controlador [Documentación | `Form Request`](https://laravel.com/docs/5.4/validation#form-request-validation)
- [Documentación | `Mass Assignment`](https://laravel.com/docs/5.4/eloquent#mass-assignment)
- [Documentación | `Defining A Mutator`](https://laravel.com/docs/5.4/eloquent-mutators#defining-a-mutator)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Requests\StorePostRequest.php`

- Más información en `app\Http\Controllers\Admin\PostsController.php`

- Más información en `app\Post.php`
<!-- end information -->