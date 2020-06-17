
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Roles y usuarios__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Abrir `Tinker`
   > php artisan tinker

   > use Spatie\Permission\Models\Role;

   > $adminRole = Role::create(['name' => 'Admin']);

   **Se crea el role 'admin' en la tabla roles de la base de datos*
   > $u = App\User::first();
   
     **Se obtiene el primer usuario de la tabla users*
   > $u->assignRole($adminRole);

   **Se le asigna el role admin al primer usuario*

   **Se puede usar la función assignRole() porque se importó el trait `use HasRoles` en el modelo User*
   > $u->hasRole('Admin')

   **Preguntar si el primer usuario tiene el role admin (devuelve true porque existe el role y lo tiene asignado)*
   > $u->hasRole('Writer')

   **Preguntar si el primer usuario tiene el role admin (devuelve false porque no existe el role y no lo tiene asignado)*
   > exit

   **Salir de Tinker*

2. Edición del seed `database\seeds\UsersTableSeeder.php`

   **No olvidar importar el modelo `use Spatie\Permission\Models\Role;`*
3. Edición del archivo `database\seeds\DatabaseSeeder.php`
4. Rehacer las migraciones con los seeds
   > php artisan migrate:fresh --seed
5. Edición del modelo `app\Post.php`
6. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `index()`
7. Edición de la Policy `app\Policies\PostPolicy.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `database\seeds\UsersTableSeeder.php`
- Más información en `database\seeds\DatabaseSeeder.php`
- Más información en `app\Post.php`
- Más información en `app\Http\Controllers\Admin\PostsController.php`
- Más información en `app\Policies\PostPolicy.php`
<!-- end information -->