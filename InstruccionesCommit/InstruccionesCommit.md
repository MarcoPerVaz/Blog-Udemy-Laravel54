
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Políticas de acceso a publicaciones__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo seed `database\seeds\UsersTableSeeder.php`
2. Edición del archivo seed `database\seeds\PostsTableSeeder.php`
3. Rehacer las migraciones con los seeds
   > php artisan migrate:fresh --seed
4. Creación y edición de la Policy `app\Policies\PostPolicy.php`
   > php artisan make:policy PostPolicy -m Post

     **-m Post Vincula la Policy al modelo `app\Post.php` y crea funciones por defecto `view(User $user, Post $post)`, `create(User $user)`, `update(User $user, Post $post)` y `delete(User $user, Post $post)`*

     **Laravel crea el directorio `app\Policies` si no existe al usar el comando*
   - Edición de la función `view(User $user, Post $post)`
   - Edición de la función `create(User $user)`
   - Edición de la función `update(User $user, Post $post)`
   - Edición de la función `delete(User $user, Post $post)`
5. Edción del archivo `app\Providers\AuthServiceProvider.php`
6. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `index()`
   - Edición de la función `store(Request $request)`
   - Edición de la función `edit(Post $post)`
   - Edición de la función `update(Post $post, StorePostRequest $request)`
   - Edición de la función `destroy(Post $post)`
7. Edición de la vista `resources\views\admin\layout.blade.php`
8. Creación y edición de la vista `resources\views\errors\403.blade.php`

   **Vista para mostrar el error 403 - Forbidden o prohibida cuando no se tenga autorización de ver la página*
9. Edición del modelo `app\Post.php`
   - Edición de la función `create(array $attributes = [])`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Introduction csrf protection`](https://laravel.com/docs/5.5/csrf#csrf-introduction)
- [Documentación | `Generating Policies`](https://laravel.com/docs/5.5/authorization#creating-policies)
- [Documentación | `Registering Policies`](https://laravel.com/docs/5.5/authorization#registering-policies)
- [Documentación | `Writing Policies`](https://laravel.com/docs/5.5/authorization#writing-policies)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `database\seeds\UsersTableSeeder.php`
- Más información en `database\seeds\PostsTableSeeder.php`
- Más información en `app\Policies\PostPolicy.php`
- Más información en `app\Providers\AuthServiceProvider.php`
- Más información en `app\Http\Controllers\Admin\PostsController.php`
- Más información en `resources\views\admin\layout.blade.php`
- Más información en `resources\views\errors\403.blade.php`
- Más información en `app\Post.php`
<!-- end information -->