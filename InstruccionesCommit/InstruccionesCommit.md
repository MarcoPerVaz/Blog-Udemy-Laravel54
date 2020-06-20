
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Editar contraseña__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición de la vista `resources\views\admin\users\edit.blade.php`
2. Creación y edición del FormRequest `app\Http\Requests\UpdateUserRequest.php`
   > php artisan make:request UpdateUserRequest

    **Si el directorio `app\Http\Requests` no existe Laravel lo crea al usar el comando*
    - Edición de la función `authorize()`
    - Edición de la función `rules()`
      
      **No olvidar importar `use Illuminate\Validation\Rule;`*
3. Edición del controlador `app\Http\Controllers\Admin\UsersController.php`
   - Edición de la función `update(Request $request, User $user)`
     

     **No olvidar importar el FormRequest `use App\Http\Requests\UpdateUserRequest;`*
4. Edición del modelo `app\User.php`
   - Creación y edición del mutador `setPasswordAttribute($password)`
5. Edición del controlador `app\Http\Controllers\Auth\RegisterController.php`
   - Edición de la función `create(array $data)`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | 'Form Request Validation'](https://laravel.com/docs/5.5/validation#form-request-validation)
- [Documentación | 'Accessors & Mutators'](https://laravel.com/docs/5.5/eloquent-mutators#accessors-and-mutators)
- [Documentación | 'bcrypt()'](https://laravel.com/docs/5.5/helpers#method-bcrypt)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Http\Requests\UpdateUserRequest.php`
- Más información en `app\Http\Controllers\Admin\UsersController.php`
- Más información en `app\User.php`
- Más información en `app\Http\Controllers\Auth\RegisterController.php`
<!-- end information -->