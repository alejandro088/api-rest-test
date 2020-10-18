# Consignas:

- [x] Con el fin de hacer una demo explicando los pros y contras, anotar todo inconveniente que se presente y la solución aplicada.
- [x] Usar passport:client (client id y client secret).
- [x] Usar la versión de Laravel que mejor creas.
- [x] Entregar la URL de la documentación que genera Swagger donde estará el autentificar con las credenciales que generes en Laravel y el endpoint para probar la API (esto es lo que hablamos de subirlo a un servidor).
- [x] La API, además del login OAuth, debe tener un único endpoint privado que reciba un email opcional por parámetro y devuelva un JSON con true si es un email válido, o false si no lo es.  
- [x] Enviar un ejemplo (puede ser un video, un gif, un paso a paso con screenshots...) de como hacer la llamada a la API mediante Postman.
- [x] En lo posible enviar LINK al repositorio o un ZIP con el proyecto.
- [x] Enviar la cantidad de tiempo real que te llevó la implementación en horas.

## Problemas presentados

Se presentó un problema al utilizar passport:client en heroku. Por lo que tuve que añadir en el composer.json lo siguiente.

Error obtenido:

```json
 "message": "Key path \"file:///app/storage/oauth-public.key\" does not exist or is not readable",
    "exception": "LogicException",
    "file": "/app/vendor/league/oauth2-server/src/CryptKey.php",
 ```

Solución:

```json
"post-install-cmd": [
            "@php artisan clear-compiled",
            "@php artisan optimize",
            "chmod -R 777 storage",
            "@php artisan passport:keys" 
 ]
 ```
 
 No he tenido incovenientes a la hora de realizar esta demostración, aunque por tener escasos conocimientos sobre Passport, debi documentarme previamente, por lo cual se ha demorado en la resolución de este ejercicio. Aunque no lo he contado en el contador de tiempo debido a que, no es parte de la implementación.

## Como usar esta implementación

Para hacer uso de esta api, en primer lugar debemos autorizarnos.

He proporcionado un usuario de prueba para este ejemplo.

Los datos de acceso estan disponible en la documentación de Swagger.

[https://app.swaggerhub.com/apis-docs/alejandro088/passport/1.0.0](https://app.swaggerhub.com/apis-docs/alejandro088/passport/1.0.0)

Si utilizamos PostMan para acceder a la ruta privada. Previamente debemos ingresar al endpoint usando el verbo POST: https://api-rest-validator.herokuapp.com/oauth/token escribiendo en la seccion body los siguientes datos. Previamente debemos dirigirnos a la subseccion RAW y luego cambiamos el formato a JSON.

![PostMan](https://repository-images.githubusercontent.com/304979654/34300d00-10c8-11eb-9352-cf084f141756)


```json
{ 
    "grant_type": "password",
    "client_id": "91ca32b4-3f06-4fb5-a205-9172a931a47c",
    "client_secret": "mbJjLhGcJWhL58DpgBfxPw4gmYzDU5KBuQ7S8hFN",
    "username": "admin@webxander.com",
    "password": "secret"
}
```

Una vez ingresado los datos, al pulsar el boton Send, la Aplicacion nos mostrara una respuesta.

![PostMan](https://repository-images.githubusercontent.com/304979654/0b5c4780-10c9-11eb-9164-9b30a6a3ae1a)

Aqui copiaremos el access_token.

A continuación ingresaremos el endpoint con el verbo GET

https://api-rest-validator.herokuapp.com/api/validate

Nos dirigimos hacia el apartado **Authorization** y seleccionaremos el Type **Bearer Token**.

Luego debemos copiar el token obtenido anteriormente en la casilla Token, como se muestra en la siguiente imagen.

![PostMan](https://repository-images.githubusercontent.com/304979654/99d0c900-10c9-11eb-8043-6e55a9d6c4ad)

Si omitimos este paso, al ingresar a esta ruta, nos dara un error ya que debemos estar autentificados.

Una vez ingresado el token, para comprobar si un email valido o no. Debemos ir al apartado Params y añadir el parametro **email** en key, y el email que queremos validar, en **value**.

![PostMan](https://repository-images.githubusercontent.com/304979654/91c55900-10ca-11eb-81c4-86125b7a3b58)

La aplicacion nos retornará **true** si el email es valido, y **false** si no lo es. 

Si no ingresamos ningun email, la aplicación retornará **null**

## Tiempo empleado:

Reporte via Clokify:

https://github.com/alejandro088/api-rest-test/blob/master/Clockify_Detailed_Report_10_12_2020-10_18_2020.pdf
