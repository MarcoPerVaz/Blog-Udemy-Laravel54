
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Permisos de usuario__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\layout.blade.php`
2. Abrir `Tinker`
   > php artisan tinker

   > use Spatie\Permission\Models\Permission;

   > $permission = Permission::create(['name' => 'View posts']);

   **['name' => 'View posts'] 'View posts' Es el nombre que se le da al permiso y se guarda en la tabla 'permissions' de la base de datos*
   > use Spatie\Permission\Models\Role;

   > $roleAdmin = Role::find(1);

   > $roleAdmin->givePermissionTo($permission);

   **Se le da el permiso recien creado ('View posts') al usuario 'Admin' y se muestra en la tabla 'role_has_permission' en la base de datos*
   > $u = App\User::find(1);

   > $u->givePermissionTo('View posts');

   **Se le da el permiso 'View posts' al usuario con 'id'=1*
   > $u->hasPermissionTo('View posts');

   **Sirve para preguntar si el usuario tiene el permiso 'View posts' si devuelve true es porque si lo tiene*
   > exit

   **Salir de tinker*
3. Edición del seed `database\seeds\UsersTableSeeder.php`
   
   **No olvidar importar el modelo `use Spatie\Permission\Models\Permission;`*
4. Rehacer las migraciones con seeds
   > php artisan migrate:fresh --seed
5. Edición del controlador `app\Http\Controllers\Admin\PostsController.php`
   - Edición de la función `edit(Post $post)`
6. Edición del modelo `app\Post.php`
7. Edición de la Policiy `app\Policies\PostPolicy.php`
   - Edición de la función `view(User $user, Post $post)`
   - Edición de la función `create(User $user)`
   - Edición de la función `update(User $user, Post $post)`
   - Edición de la función `delete(User $user, Post $post)`
8. Abrir `Tinker`
   - Darle permisos de ver todos los posts al usuario 'otrousuario@mail.com'
     > php artisan tinker

     > $user = App\User::find(2);

     > $user->givePermissionTo('View posts');

     **Funcionó probando desde el navegador lo de darle el permiso al 'otrousuario@mail.com' de ver todos los posts incluyendo los que no son suyos*
   - Darle permisos de ver todos los posts al role 'Writer'
     > use Spatie\Permission\Models\Role;

     > $role = Role::find(2);

     > $role->givePermissionTo('View posts');

     **Funcionó probando desde el navegador lo de darle el permiso al role 'Writer' de ver todos los posts*

     > exit
9. Abrir `Tinker`
   - Darle permisos de ver y actualizar todos los posts al role 'Writer'
     > use Spatie\Permission\Models\Role;

     > $role = Role::find(2);

     > $role->givePermissionTo('View posts');

     > $role->givePermissionTo('Update posts');

     **Funcionó probando desde el navegador lo de darle el permiso al role 'Writer' de ver y actualizar todos los posts*

     > exit
10. Rehacer las migraciones con seeds
   > php artisan migrate:fresh --seed
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `resources\views\admin\layout.blade.php`
- Más información en `database\seeds\UsersTableSeeder.php`
- Más información en `app\Http\Controllers\Admin\PostsController.php`
- Más información en `app\Post.php`
- Más información en `app\Policies\PostPolicy.php`
<!-- end information -->