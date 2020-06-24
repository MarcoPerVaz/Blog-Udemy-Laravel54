
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.5</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Enviar las credenciales vía email__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.5` ](https://laravel.com/docs/5.5/)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo `app\Listeners\SendLoginCredentials.php`
   - Edición de la función `handle(UserWasCreated $event)`
     
     **No olvidar importar `use Illuminate\Support\Facades\Mail;`*

     **No olvidar importar `use App\Mail\LoginCredentials;`*
2. Creación del mail
   > php artisan make:mail LoginCredentials -m emails.login-credentials
     
     **`-m` Es para crear una plantilla con markdown (Ver más información en notas)*

     **`emails.login-credentials` para crear el email en `resources\views\emails\login-credentials.blade.php` Laravel crea los directorios necesarios `app\Mail` ya que se especifica en el comando que cree la carpeta `Mail`*
     - El comando crea el archivo `app\Mail\LoginCredentials.php`
       
       **El comando crea automáticamente el directorio `app\Mail`*
     - El comando crea la vista `resources\views\emails\login-credentials.blade.php`

       **El comando crea automáticamente el directorio `resources\views\emails`*
3. Edición del archivo `app\Mail\LoginCredentials.php`
   - Edición de la función `__construct()`
   - Edición de la función `build()`
4. Edición del archivo de rutas `routes\web.php` para previsualizar el email (sólo de prueba)
5. Edición de la vista `resources\views\emails\login-credentials.blade.php`
6. [Ir a `Mailtrap`](https://mailtrap.io/)
   - Crear cuenta o iniciar sesión
   - Obtener las credenciales y pasarlas al archivo `.env`
7. Edición del archivo `.env` la información viene de `Mailtrap`
   - MAIL_DRIVER=smtp
   - MAIL_HOST=smtp.mailtrap.io
   - MAIL_PORT=2525
   - MAIL_USERNAME=obtenerloDeMailtrap
   - MAIL_PASSWORD=obtenerloDeMailtrap
   - MAIL_ENCRYPTION=null
8. Edición del archivo `.env-example` la información viene de `Mailtrap`
   
   **Modificar este archivo sirve para que al clonar el proyecto, los datos de configuración tengan consistencia*
   - MAIL_DRIVER=smtp
   - MAIL_HOST=smtp.mailtrap.io
   - MAIL_PORT=puertoMailTrap
   - MAIL_USERNAME=obtenerloDeMailtrap
   - MAIL_PASSWORD=obtenerloDeMailtrap
   - MAIL_ENCRYPTION=null
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- Comando para ver los subcomandos y su descripción
  > php artisan make:mail -h
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Listeners\SendLoginCredentials.php`
- Más información en `app\Mail\LoginCredentials.php`
- Más información en `routes\web.php`
<!-- end information -->