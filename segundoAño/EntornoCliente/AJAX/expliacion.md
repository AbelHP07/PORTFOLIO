## AJAX
#### 17/11/2026

#### Métodos

- `open()`

Sirve para preparar una conexión XMLHTTPRequest e inicializa todos los atributos del objeto:

> xmlhttp.open (Metodo, URL, sincronia)

- Método: 'Get' o 'Post'.

- URL: es la dirección del archivo hacia el que se realiza la petición HTTP.

- Sincronía: true o false dependiendo de si se quiere asíncrona (true) o no (false).

<br>

- `send()`

Es el que envía la petición abierta con `open()`.

Este método tiene un único parámetro, el contenido, esto es: lo que se quiere enviar al servidor. Por loq que, en caso de que sea por Post, se pone lo que se quiere enviar directamente, y en caso de ser Get, se pasa null, puesto que el dato se envía por la URL.

#### Propiedades

- `readyState`

Devuelve el estado actual del objeto XMLHTTPRequest:

- 0 → Sin inicializar
- 1 → Abierto (se acaba de llamar a `open()`)
- 2 → Enviado (los datos al usar `send()`)
- 3 → Recibiendo
- 4 → Completado (datos procesados)

- `onreadystatechange`

Comprueba y observa que haya cambiado de estado la petición, dando la posibilidad de ejecutar funciones una vez se hayan obtenido los datos:

>xmlhttp.onreadystatechange = function() {
>    if (xmlhttp.readyState === 4) {
>        el resto del código
>    }
>};

Teniendo así un código que solo se ejecuta en caso de que el estado de la petición sea el cuarto (petición completada).

- `responsetext`

Esta propiedad devuelve el texto descargado del servidor en ua petición XMLHTTPRequest.

Sirve para texto plano.

- `status` y `statusText`

Status obtiene los códigos de estado de la petición http:

- 200 → OK
- 400 → Solicitud incorrecta
- 401 → No autorizado
- 403 → Prohibido
- 404 → No encontrado
- 500 → Error interno
- 505 → Versión de HTTP no soportada

Y statusText contiene el texto descriptivo de cada uno.

- `responseXML`

Hace lo mismo que responseText, pero en formato XML formateado, no en texto plano.

Debemos tratarlo con DOM.