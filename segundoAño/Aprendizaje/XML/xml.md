## XML

#### PHP

En este caso es muy fácil:

><?php
>$xmlTexto = "<usuario><nombre>Ana</nombre><edad>25</edad></usuario>";
>
>// 1. Convertimos el texto en un objeto navegable
>$datos = simplexml_load_string($xmlTexto);
>
>// 2. Entramos en <nombre> y <edad> usando "->"
>echo $datos->nombre; // Muestra: Ana
>echo $datos->edad;   // Muestra: 25

Si el XML está en un archivo llamado datos.xml, en lugar de `simplexml_load_string($xmlTexto)` usas `simplexml_load_file("datos.xml")`.

- Cómo accedemos a propiedades?:

><?php
>$xmlTexto = '<usuario id="7" rol="admin"><nombre>Ana</nombre></usuario>';
>
>$usuario = simplexml_load_string($xmlTexto);
>
>echo $usuario->nombre;      // Muestra: Ana
>echo $usuario['id'];          // Muestra: 7
>echo $usuario['rol'];         // Muestra: admin

En caso de querer guardar el dato en una variable, tranfórmalo en un tipo de dato u otro:

>$nombre = (string) $usuario->nombre;

#### JavaScript

>const xmlTexto = "<usuario><nombre>Ana</nombre><edad>25</edad></usuario>";
>
>// 1. Convertimos el texto en un documento navegable
>const parser = new DOMParser();
>const doc = parser.parseFromString(xmlTexto, "application/xml");
>
>// 2. Buscamos la etiqueta y sacamos su texto con .textContent
>const nombre = doc.querySelector("nombre").textContent;
>const edad = doc.querySelector("edad").textContent;
>
>console.log(nombre); // Muestra: Ana
>console.log(edad);   // Muestra: 25

- Cómo accedemos a propiedades?:

>const xmlTexto = '<usuario id="7" rol="admin"><nombre>Ana</nombre></usuario>';
>
>const parser = new DOMParser();
>const doc = parser.parseFromString(xmlTexto, "application/xml");
>
>const usuario = doc.querySelector("usuario");
>
>const nombre = usuario.querySelector("nombre").textContent;
>const id = usuario.getAttribute("id");
>const rol = usuario.getAttribute("rol");
>
>console.log(nombre); // Muestra: Ana
>console.log(id);     // Muestra: 7
>console.log(rol);    // Muestra: admin

