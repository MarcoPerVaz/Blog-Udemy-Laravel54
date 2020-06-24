
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Políticas de acceso a usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo `app\Listeners\SendLoginCredentials.php`
2. Creación y edición de la Policy `php artisan make:policy UserPolicy -m User`
   
   **`-m` Es para vincular la policy con el modelo app\User.php en este caso*
   - Creación y edición de la función `before($user)`
   - Edición de la función `view(User $user, User $model)`
   - Edición de la función `create(User $user)`
   - Edición de la función `update(User $user, User $model)`
   - Edición de la función `delete(User $user, User $model)`
3. Edición del archivo `app\Providers\AuthServiceProvider.php`
4. Edición del modelo `app\User.php`
   - Creación y edición del queryscope `scopeAllowed($query)`
5. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `index()`
   - Edición de la función `create()`
   - Edición de la función `store(Request $request)`
   - Edición de la función `show(User $user)`
   - Edición de la función `edit(User $user)`
   - Edición de la función `update(UpdateUserRequest $request, User $user)`
6. Edición del seeder `database\seeds\UsersTableSeeder.php`
7. Rehacer las migraciones con seeds
   > php artisan migrate:fresh --seed
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Query scopes`](https://laravel.com/docs/5.5/eloquent#query-scopes)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Policies\UserPolicy.php`
- Más información en `app\Providers\AuthServiceProvider.php`
- Más información en `app\User.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `database\seeds\UsersTableSeeder.php`
<!-- end information -->