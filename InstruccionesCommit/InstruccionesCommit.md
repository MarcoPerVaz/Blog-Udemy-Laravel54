
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Integrando el login__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Integrar el scaffolding de Auth
   > php artisan make:auth --views

   **--views Indica que solo se deben generar las vistas para Auth*
2. Edición del archivo de rutas `routes\web.php`
3. Eliminación del directorio `resources\views\layouts` (este directorio se crea con el comando auth)
   - Eliminación de la vista `resources\views\layouts\app.blade.php` (esta vista se crea con el comando auth)
4. Edición de la vista `resources\views\auth\login.blade.php` (Esta vista la crea el comando auth)
   - Copiar el contenido del archivo `\pages\examples\login.html` del archivo descargado de AdminLTE 2.3.11 y pegar en `resources\views\auth\login.blade.php`*
   - Edición de la vista `resources\views\auth\login.blade.php` para diseñarla de acuerdo al proyecto
5. Edición del archivo `config\app.php`
   - Esto `'name' => env('APP_NAME', 'Laravel'),` por esto `'name' => env('APP_NAME', 'Zendero'),`
   - Esto `'timezone' => 'UTC',` por esto `'timezone' => 'America/Mexico_City',` (Para México)
   - Esto `'locale' => 'en',` por esto `'locale' => 'es',`
6. Edición del archivo de configuración `.env` y `.env.example`
7. Creación del directorio `resources\lang\es`
    - Creación y edición del archivo `resources\lang\es\auth.php`
    - Creación y edición del archivo `resources\lang\es\pagination.php`
    - Creación y edición del archivo `resources\lang\es\passwords.php`
    - Creación y edición del archivo `resources\lang\es\validation.php`

      **La información de los 4 archivos fue tomada de [Laravel lang Español](https://github.com/caouecs/Laravel-lang/tree/master/src/es)*

    - Para instalar el paquete de idiomas `Laravel Lang`
        > composer require caouecs/laravel-lang:~3.0

        **Ir a `vendor/caouecs/laravel-lang` elegir el lenguaje, copiar la carpeta con el idioma que desee y pegarla en `resources\lang`*
8. Creación de un usuario usando `Tinker`
   > php artisan tinker

   > $user = new App\User;

   > $user->name = "Marco";

   > $user->email = "admin@mail.com";

   > $user->password = bcrypt('123456');

   > $user->save();

   > exit
9. Edición de la vista `resources\views\admin\dashboard.blade.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- [Zonas horarias | `PHP`](https://www.php.net/manual/es/timezones.php)
- [Laravel Lang](https://github.com/caouecs/Laravel-lang)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `routes\web.php`

- Más información en `resources\views\auth\login.blade.php`

- Más información en `resources\views\admin\dashboard.blade.php`
<!-- end information -->