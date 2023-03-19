# MASW01_actividad_2

### Validaciones con Laravel

Para realizar una ejecución real de la aplicación en un entorno local, basta con seguir los siguientes pasos:

- Tener instalado Composer y php en el equipo

-  Tener instalado Laravel 9 en el equipo

- Descomprimir la carpeta zip

- Instalar los módulos necesarios
```sh
npm i
```

- Instalar la carpeta vendor de Laravel
```sh
composer install
```
- Debe crear en local una base de datos con los siguientes parametros:
``` json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root
```
Para conectar a la base de datos se debe configurar el archivo .env, pero ese archivo no viene incluido en el .zip, asi que debe generarlo. Hay dos opciones para crearlo.
*   Puede copiar y pegar el **.env.example** que viene en el .zip en la base del proyecto y cambiarle el nombre a **.env**, luego ejecutar el siguiente comando:
```sh
php artisan key:generate
```
* O bien, puede seguir estos pasos:
1. Cree un archivo **.env** en el proyecto base
2. Copie el contenido de [.env.example](https://github.com/laravel/laravel/blob/master/.env.example/ ".ev")
3. Péguelo en su archivo **.env**
4. Cambie los datos de conexiòn por los datos de la base de datos que creo en el punto anterior
5. Coloque el **USERNAME** y la **PASSWORD** de acceso a la bbdd creada en su entorno local para la conexion a bbdd.

La configuraciòn debe quedar de la siguiente manera, si no coloca la contraseña (DB_PASSWORD) va a generar error cuando ejecute el comando de las migraciones:
``` json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root
```
6. Luego corra el comando:
``` json
 php artisan key:generate
```

Si se tiene instalado docker, es tan sencillo como ejecutar un comando como el siguiente en una terminal para crear la base de datos localmente. Habra que tener en cuenta que los puertos no colisionen con cualquier otra maquina que se este ejecutando localmente.
```bash
docker run -d -p 3306:3306 --name test2 -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=test mysql
```



- Ejecutar las migraciones
```sh
php artisan migrate
```

- Ejecutar los Seeders
```sh
php artisan db:seed
```

- Arrancar el servidor
```sh
php artisan serve
```

## Postman

Para ejecutar los endpoint, debe tener instalada la herramienta Postman y siga los pasos:

- Importar la collecion y ejecutar las pruebas
- El login genera un token de acceso que debe usar para las pruebas de update, usersList y delete.

## Navegador

Para ver la parte web basta con hacer los siguientes pasos:

- Introducir en el navegador la dirección http://localhost:puerto/

Ejemplo: http://localhost:8000/users/login

## License

**SuperPC!**