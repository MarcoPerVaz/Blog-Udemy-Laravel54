
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Instalando el paquete laravel-permission__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. [Instalar Laravel Permission
   > composer require spatie/laravel-permission "^2.37"
2. Edición del archivo `composer.json`

   **Algunos de los cambios se obtienen de link `Repositorio de Laravel 5.5 - composer.json` que está en notas (favor de comparar)*
3. Usar el comando para actualizar las dependencias de composer
   > composer update
4. Publicar las migraciones de Laravel Permission
   > php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"

     **Publicar significa que se pueden editar los archivos del paquete*
5. Ejecutar la migración de Laravel Permission
   > php artisan migrate
6. Edición del modelo `app\User.php`

   **No olvidar importar `use Spatie\Permission\Traits\HasRoles;`*
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Documentación | `Laravel Permission`](https://docs.spatie.be/laravel-permission/v2/installation-laravel/)
- Ir a [Repositorio de Laravel 5.5 - `composer.json`](https://github.com/laravel/laravel/blob/5.5/composer.json)
- En el modelo `app\User.php` solo se importo `use Spatie\Permission\Traits\HasRoles;`
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\User.php`
<!-- end information -->