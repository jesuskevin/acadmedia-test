# Acadmedia

Prueba tecnica realizada con Laravel y Livewire.

## Instalacion y puesta en marcha

Para instalar este pryecto primero debemos descargar el repositorio de github.

```bash
git clone https://github.com/jesuskevin/acadmedia-test.git
```

Posterior a esto, procedemos a instalar todas las dependencias. Tanto de Laravel como de Javascript, ejecutando los siguientes comandos.

```bash
composer install
npm instal && npm run build
```

Luego de esto debemos proceder a crear un archivo punto .env  usamos los valores que se encuentran en el archivo .env.example.
Todo esto en la raiz de nuestro proyecto. Si se desea usar el envio de correos debemos de configurar las variables de entorno con
el servicio de prueba de nuestra preferencia, en mi caso utilizo https://www.mailtrap.io. Este nos ofrece la configuracion para
utilizarlo con Laravel en nuestro caso. Tambien debemos de ejecutar el comando de artisan

```bash
php artisan key:generate
```

Esto para crear la clave de nuestra aplicacion que nos evita de errores a la hora de la serializacion de cookies y la encryptacion.
Medidas de seguridad implementadas por Laravel.

Completado este paso procedemos a crear una archivo .sqlite llamado database. Esta sera nuestra base de datos.
El archivo debe de estar ubicado dentro de la carpeta database en la raiz de nuestro proyecto.

Luego procedemos a ejecutar nuestras migraciones y seeder con el siguiente comando

```bash
php artisan migrate --seed
```

Esto creara nuestras tablas en la base de datos y las cargara con algo de informacion inical de prueba.

Y por ultimo ejecutamos el comando

```bash
composer run dev
```

Esto para que nuestro proyecto comienze a ejecutarse y podamos acceder a el mediante el servidor local
ubicado generalmente en la direccion http://127.0.0.1:8000.

## API Endpoints

Para temas de los endpoint del API dejo en la carpeta raiz del proyecto un archivo llamado
'Acadmedia test.postman_collection.json' este es un archivo JSON que podemos importar en POSTMAN
donde se encuentran los endpoints de la api asi como los cuerpos de las peticiones a enviar.

Cabe destacar que debemos hacer antes de utilizar la misma y el token que nos devuelve lo copiamos y pegamos
en la carpeta principal listada en el POSTMAN especificamente en la pesta;a Authorization seleccionando la
opcion 'Bearer Token'.