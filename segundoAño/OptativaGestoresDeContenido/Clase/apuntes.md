- Broadcast

Sirve para mandar un "paquete" a todos los dispositivos conectados a una red.

> 192.168.1.255

- Red

> 192.168.1.0

Es el identificador de toda la red, no se usa como IP de un dispositivo.

---
---

- /etc/apache2/apache2.conf

Configuración de apache.

- /etc/apache2/ports.conf

Configuración de puertos por los que escucha apache.

- /etc/apache2/sites-available/

Muestra los stitos disponibles.

- /etc/apache2/sites-enabled/

Muestra los sitios activos.

- /var/log/apache2/access.log

Muestra los ficheros de acceso (quién ha accedido a la página).

- /var/log/apache2/error.log

Muestra los ficheros de error (los errores que le suceden al servidor).


Lista resumen en moodle o en archivo: Servidor Web Apache (pdf).

---
---

Una vez habilitado el dominio web, tenemos que hacer en un cmd de windows:

> cd C:\Windows\System32\drivers\etc

Y entro nos metemos en:

> dir

Para ver qué ficheros hay (y comprobamos si está hosts).

> notepad hosts

Y en el bloc de notas que se nos abre, añadimos:

> 192.168.56.10 ejemplo.com     www.ejemplo.com

Guardamos

Todo esto desde cmd de windows con usuario sudo

cmd y ejecutar como administrador.

Todo esto para crear un dominio que funciona solo en un dispositivo, o incluso para redireccionar a una página que quieras (si se accede a ejemplo.com puedes poner lo de antes pero en vez de poner www.ejemplo.com, pones algo como: www.noentrar.com (en teoría se debe poner algo para redireccionar al dispositivo mismo, bloqueándose así la búsqueda))