- Guardar foto en carpeta

Tú envías la foto a través de un formulario en php (por post).

Obtienes la imagen después con la variable especial $_FILES, donde se guarda la imagen de forma temporal cuando la subes por un formulario.

Obtengo el tipo de archivo para validar que sí sea una foto:

> $tipo = mime_content_type($_FILES["foto"]["tmp_name"]);

Luego, ya puedo comprobar que sea tipo "image/".

Pillo el nombre del archivo:

> $nombre = basename($_FILES["foto"]["name"]);

Utilizo basename para asegurarme de coger foto.jpg y no una ruta.

Luego, cambio la ruta de la imagen:

> $ruta = "uploads/" . $nombre;

Logrando con esto que se establezca otra ruta.

Y, por último, hacemos:

> move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

Para moverlo de la ruta temporal a la definitiva.

- Guardar foto en base de datos

Es igual qe la de arriba hasta guardar el tipo de archivo, en donde guardamos también los bytes de la foto:

> $imagen = file_get_contents($_FILES["foto"]["tmp_name"]);

Que contendría la imagen en sí (en formato BLOB) lista para meter en la base de datos.

Luego, para mostrarlo hacemos una cosa tal que:

Primero hacemos la consulta para sacar el nombre y el tipo de la imagen

> $consulta = $pdo->prepare("SELECT foto, tipo_foto FROM empleados WHERE id = ?");
> $consulta->execute([$_GET["id"]]);

Obteniendo así la imagen y su tipo.

Luego:

> $datos = $consulta->fetch();

Obtenemos un array con ambas columnas.

Luego:

> header("Content-Type: " . $datos["tipo_foto"]);

Que hace que con header (que header sirve para enviar cabeceras http al navegador, no solo redirige) se establezca que el archivo que vas a mostrar a continuación es una imagen o el tipo del que sea el archivo que se ha enviado.

Para luego oder hacer algo como:

> '<'img src="<?= $datos['foto'] ?>>">

Y se pondría la foto.