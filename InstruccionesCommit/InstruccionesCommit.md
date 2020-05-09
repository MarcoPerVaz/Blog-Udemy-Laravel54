
<!-- title -->
<h1 align="center">Curso - Blog Udemy con Laravel 5.4</h1>
<!-- end title -->

<!-- commit name -->
### Commit | __Creando la tabla Posts y la Base de Datos__
<!-- end commit name -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- official documentation -->
[Documentación oficial | `Laravel 5.4` ](https://laravel.com/docs/5.4)
<!-- end official documentation -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- commit instructions -->
#### Instrucciones Commit
1. Edición del archivo `.env` y `.env.example`
2. Creación de la base de datos `blog_udemy_laravel54`
   - Opción 1:
     - Crea la base de datos `blog_udemy_laravel54` de forma manual desde el gestor de base de datos (en este caso HeidiSql)
   - Opción 2:
     - Desde consola (git bash, git bash en vscode o la terminal de laragon)
     - Debe estar encendido el servidor de base de datos
       > mysql -uroot

       > CREATE DATABASE blog_udemy_laravel54;

       > exit
3. Ejecutar las migraciones
   > php artisan migrate

   - Si se usa MariaDB hay un problema `Specified key was too long; max key length es 767 bytes`
     - Solución:
       - Edición del archivo `app\Providers\AppServiceProvider.php`
         - Edición de la función `boot()`

         **No olvidar importar `use Illuminate\Support\Facades\Schema;`*

     **Si se mostró el error en consola, deberá borrar manualmente las tablas en la base de datos y ejecutar `php artisna migrate` nuevamente*
4. Creación del modelo `app\Post.php` junto a su migración `database\migrations\2020_05_09_170826_create_posts_table.php`
   > php artisan make:model Post -m

   **Laravel asigna el nombre a la migración basandose en el nombre del modelo*
   - Edición de la migración `database\migrations\2020_05_09_170826_create_posts_table.php`
<!-- end commit instructions -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- notes -->
#### Notas:
- El archivo de configuración `.env.example` sirve por si se clona el repostorio tener consistencia de que información debe ir en el archivo `.env`
- [Available Column Types](https://laravel.com/docs/5.4/migrations#creating-columns)
<!-- end notes -->

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

<!-- information -->
#### Información:
- Más información en `app\Providers\AppServiceProvider.php`

- Más información en `database\migrations\2020_05_09_170826_create_posts_table.php`
<!-- end information -->