<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Alta Empleados</title>
</head>

<body id="vista">

    <div class="titulo">
        <p>
            <span>Alta Datos Empleados</span> (Pantalla 1)
        </p>
    </div>

    <form action="empleados.php" method="POST" enctype="multipart/form-data">

        <table class="vista">
            <!-- Nombre ----------------------------- -->

            <tr>
                <td>
                    <label for="nom">Nombre: *</label>
                </td>

                <td>
                    <input
                        type="text"
                        name="nombre"
                        class="nombre"
                        id="nom"
                        value="<?= !$empleado->tieneErrores() ? "" : $datosEnviados['nombre'] ?>"
                    >

                    <?= $empleado->getError("nombre") ?>
                </td>
            </tr>

            <!-- Apellidos ----------------------------- -->

            <tr>
                <td>
                    <label for="ap">Apellidos: *</label>
                </td>

                <td>
                    <input
                        type="text"
                        name="apellidos"
                        id="ap"
                        value="<?= !$empleado->tieneErrores() ? "" : $datosEnviados['apellidos'] ?>"
                    >

                    <?= $empleado->getError("apellidos") ?>
                </td>
            </tr>

            <!-- Fecha de nacimiento ----------------------------- -->

            <tr>
                <td>
                    <label for="fe-nac">Fecha de nacimiento: *</label>
                </td>

                <td>
                    <input
                        type="date"
                        name="fechaNac"
                        id="fe-nac"
                        value="<?= !$empleado->tieneErrores() ? "" : $datosEnviados['fechaNac'] ?>"
                    >

                    <span>(dd/mm/aaaa)</span>

                    <?= $empleado->getError("fechaNac") ?>
                </td>
            </tr>

            <!-- Sueldo ----------------------------- -->

            <tr>
                <td>
                    <label for="sueldo">Sueldo: *</label>
                </td>

                <td>
                    <input
                        type="text"
                        name="sueldo"
                        id="sueldo"
                        value="<?= !$empleado->tieneErrores() ? "" : $datosEnviados['sueldo'] ?>"
                    >

                    <?= $empleado->getError("sueldo") ?>
                </td>
            </tr>

            <!-- Categoría ----------------------------- -->

            <tr>
                <td id="tit-cat">
                    <label for="cat">Categoría: *</label>
                </td>

                <td>
                    <select name="categoria" id="cat">

                        <option value="">-- Elige --</option>

                        <option
                            value="peon"
                            <?= $empleado->tieneErrores() && $datosEnviados['categoria'] === "peon" ? "selected" : "" ?>
                        >
                            Peón
                        </option>

                        <option
                            value="oficial"
                            <?= $empleado->tieneErrores() && $datosEnviados['categoria'] === "oficial" ? "selected" : "" ?>
                        >
                            Oficial
                        </option>

                        <option
                            value="jefeDepto"
                            <?= $empleado->tieneErrores() && $datosEnviados['categoria'] === "jefeDepto" ? "selected" : "" ?>
                        >
                            Jefe Departamento
                        </option>

                        <option
                            value="director"
                            <?= $empleado->tieneErrores() && $datosEnviados['categoria'] === "director" ? "selected" : "" ?>
                        >
                            Director
                        </option>

                    </select>

                    <?= $empleado->getError("categoria") ?>
                </td>
            </tr>

            <!-- Sexo ----------------------------- -->

            <tr id="fila-sexo">

                <td>
                    <label>Sexo: *</label>
                </td>

                <td>

                    <div>

                        <input
                            type="radio"
                            name="sexo"
                            id="h"
                            value="hombre"
                            <?= $empleado->tieneErrores() && $datosEnviados['sexo'] === "hombre" ? "checked" : "" ?>
                        >

                        <label for="h">Hombre</label>


                        <input
                            type="radio"
                            name="sexo"
                            id="m"
                            value="mujer"
                            <?= $empleado->tieneErrores() && $datosEnviados['sexo'] === "mujer" ? "checked" : "" ?>
                        >

                        <label for="m">Mujer</label>

                    </div>

                    <?= $empleado->getError("sexo") ?>

                </td>

            </tr>

            <!-- Afciones ----------------------------- -->

            <tr>

                <td>
                    <label>Aficiones: *</label>
                </td>

                <td>

                    <div>

                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="deportes"
                            <?= $empleado->tieneErrores() && !empty($datosEnviados['aficiones']) && in_array("deportes", $datosEnviados['aficiones']) ? "checked" : "" ?>
                        >
<!-- Error linea 206 // Solucionado -->
                        <label>Deportes</label>


                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="lectura"
                            <?= $empleado->tieneErrores() && !empty($datosEnviados['aficiones']) && in_array("lectura", $datosEnviados['aficiones']) ? "checked" : "" ?>
                        >

                        <label>Lectura</label>


                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="musica"
                            <?= $empleado->tieneErrores() && !empty($datosEnviados['aficiones']) && in_array("musica", $datosEnviados['aficiones']) ? "checked" : "" ?>
                        >

                        <label>Música</label>


                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="cine"
                            <?= $empleado->tieneErrores() && !empty($datosEnviados['aficiones']) && in_array("cine", $datosEnviados['aficiones']) ? "checked" : "" ?>
                        >

                        <label>Cine</label>


                        <input
                            type="checkbox"
                            name="aficiones[]"
                            value="idiomas"
                            <?= $empleado->tieneErrores() && !empty($datosEnviados['aficiones']) && in_array("idiomas", $datosEnviados['aficiones']) ? "checked" : "" ?>
                        >

                        <label>Idiomas</label>

                    </div>

                    <?= $empleado->getError("aficiones") ?>

                </td>

            </tr>

            <!-- Imagen -->

            <tr>
                <td>
                    <label for="foto">
                        Foto:
                    </label>
                </td>

                <td>
                    <input
                    type="file"
                    name="foto"
                    id="foto"
                    accept="image/*"
                    >
                <br>
                <?= $empleado->getError("foto") ?>
                </td>
            </tr>

        </table>

        <!-- Botones ----------------------------- -->

        <div class="botones">

            <div>
                <button type="submit">Enviar</button>
                <button type="reset">Limpiar</button>
            </div>

            <span>* : requerido</span>

        </div>

    </form>

    <div>
        <a href="listado.php">Acceder al listado</a>
    </div>

    <script src="script.js" defer></script>

</body>

</html>