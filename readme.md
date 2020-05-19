
<h1 align="center">Instalación | Blog Udemy con Laravel 5.4</h1>

# Pasos

1. **Clonar el proyecto usando**

      > git clone {urlDelRepositorio} "nombreProyecto"

2. **De requerirlo deberá usar la terminal de comandos para acceder a la carpeta que contiene el proyecto de laravel**

      > cd rutaProyecto

3. **Instalar las dependencias de PHP**

      > composer install

4. **Copiar y pegar el archivo `.env-example`, cambiarle el nombre a `.env`**

      **Editarlo con los datos para la conexión a la base de datos y las variables de entorno*

5. **Crear la Base de datos (OPCIONAL - Sólo si el proyecto necesita Base de Datos)**
    - Opción 1: Crear la base de datos de forma manual desde el gestor de base de datos
    - Opción 2: Abrir la terminal de `Laragon` o `Git bash`
        - Escribir:

            > mysql -u --uroot

            > create database nombreBaseDatos

            > exit

6. **Generar las migraciones (OPCIONAL - Sólo si el proyecto necesita Base de Datos y tiene información predefinida)**

      - Ejecuta las migraciones

        > php artisan migrate

      - Ejecuta las migraciones e inserta información predefinida       

        > php artisan migrate --seed  

      - Ejecuta las migraciones borrando y recreando las tablas (Advertencia: Éste comando elimina la información)       

        > php artisan migrate:refresh

      - Ejecuta las migraciones borrando y recreando las tablas (Advertencia: Éste comando elimina la información) e inserta información predefinida       

        > php artisan migrate:refresh --seed 

7. **Generar la llave del proyecto**

      > php artisan key:generate

8. Crear el enlace símbolico de `storage` a `public`
   
   > php artisan storage:link

9. **Fin**

<!-- Notas -->
#### Notas:

**El archivo InstruccionesCommit\Instrucciones_Commit.md solo tendrá información sobre el commit.*

**El proyecto fue creado con la versión de Laravel 5.3*

**Los archivos .gitkeep o .gitignore (excepto el que está en la raíz del proyecto .gitignore) se usan para que Git tenga seguimiento de carpetas vacias.*