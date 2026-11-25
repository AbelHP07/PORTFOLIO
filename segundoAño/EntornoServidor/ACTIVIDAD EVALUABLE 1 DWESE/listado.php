<?php

include_once "class/Conexion.php";

$pdo = Conexion::conectar();

$mensaje = "";

if (isset($_POST['eliminar']) && !empty($_POST['eliminar'])) {
    try{
        $sql = "DELETE FROM empleados WHERE id = :id";
        
        $consulta = $pdo->prepare($sql);
        $consulta->execute([":id" => $_POST['eliminar']]);

        if ($consulta->rowCount() > 0) {
            $mensaje = "Empleado eliminado correctamente";
        }
    } catch (PDOException $e) {
        $mensaje = "Ha habido un error: " . $e->getMessage();
    }
}

$orden = $_GET["orden"] ?? "id";
$direccion = $_GET["direccion"] ?? "ASC";

$camposPermitidos = [
    "id",
    "nombre",
    "apellidos",
    "fecha_nacimiento",
    "sueldo",
    "categoria",
    "sexo",
    "aficiones",
    "foto"
];

if (!in_array($orden, $camposPermitidos)) {
    $orden = "id";
}

if ($direccion !== "ASC" && $direccion !== "DESC") {
    $direccion = "ASC";
}

$consulta = $pdo->query("SELECT * FROM empleados ORDER BY $orden $direccion");
$empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);

$itemsPorPagina = isset($_GET["items"]) ? (int)$_GET["items"] : 5;
$pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

if ($itemsPorPagina <= 0) {
    $itemsPorPagina = 5;
}

$totalEmpleados = count($empleados);

$totalPaginas = ceil($totalEmpleados / $itemsPorPagina);

if ($pagina < 1) {
    $pagina = 1;
}

if ($pagina > $totalPaginas) {
    $pagina = $totalPaginas;
}

$inicio = ($pagina - 1) * $itemsPorPagina;

//array_slice($array, comienzo, cuántos pillo)

$empleadosPagina = array_slice($empleados, $inicio, $itemsPorPagina);


$sumaSueldos = 0;
$hombres = 0;
$mujeres = 0;

foreach ($empleados as $empleado) {

    $sumaSueldos += $empleado["sueldo"];

    if ($empleado["sexo"] === "Hombre") {
        $hombres++;
    } else {
        $mujeres++;
    }
}

if ($totalEmpleados > 0) {
    $media = $sumaSueldos / $totalEmpleados;
    $porcentajeHombres = ($hombres / $totalEmpleados) * 100;
    $porcentajeMujeres = ($mujeres / $totalEmpleados) * 100;
} else {
    $media = 0;
    $porcentajeHombres = 0;
    $porcentajeMujeres = 0;
}

$indiceAMostrar = $inicio;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Listado de empleados</title>
</head>

<body>

    <h1>Listado de empleados</h1>

    <form method="GET">

        <label for="items">Empleados por página:</label>

        <select name="items" id="items" onchange="this.form.submit()">

            <option value="5" <?= $itemsPorPagina == 5 ? "selected" : "" ?>>5</option>

            <option value="10" <?= $itemsPorPagina == 10 ? "selected" : "" ?>>10</option>

            <option value="15" <?= $itemsPorPagina == 15 ? "selected" : "" ?>>15</option>

        </select>

        <input type="hidden" name="orden" value="<?= $orden ?>">

    </form>

    <br>

    <?php

    $nuevaDireccion = "ASC";
    $indiceDelReves = false;

    if ($direccion === "ASC") {
        $nuevaDireccion = "DESC";
    } else {
        $indiceAMostrar = $totalEmpleados - $inicio + 1;
        $indiceDelReves = true;
    }

    ?>

    <table>

        <tr>

            <th>
                <a href="?orden=id&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "id" ? $nuevaDireccion : "ASC" ?>">ID</a>
            </th>

            <th>
                <a href="?orden=nombre&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "nombre" ? $nuevaDireccion : "ASC" ?>">Nombre</a>
            </th>

            <th>
                <a href="?orden=apellidos&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "apellidos" ? $nuevaDireccion : "ASC" ?>">Apellidos</a>
            </th>

            <th>
                <a href="?orden=fecha_nacimiento&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "fecha_nacimiento" ? $nuevaDireccion : "ASC" ?>">Fecha nacimiento</a>
            </th>

            <th>
                <a href="?orden=sueldo&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "sueldo" ? $nuevaDireccion : "ASC" ?>">Sueldo</a>
            </th>

            <th>
                <a href="?orden=categoria&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "categoria" ? $nuevaDireccion : "ASC" ?>">Categoría</a>
            </th>

            <th>
                <a href="?orden=sexo&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "sexo" ? $nuevaDireccion : "ASC" ?>">Sexo</a>
            </th>

            <th>
                <a href="?orden=aficiones&items=<?= $itemsPorPagina ?>&direccion=<?= $orden === "aficiones" ? $nuevaDireccion : "ASC" ?>">Aficiones</a>
            </th>

            <th>
                Foto
            </th>

            <th>
                Concatenación
            </th>

            <th>
                Acciones
            </th>

        </tr>


        <?php foreach ($empleadosPagina as $indice => $empleado): ?>

            <?php

            if($indiceDelReves){
                $indiceAMostrar--;
            }else{
                $indiceAMostrar++;
            }

            $clase = "";

            switch ($empleado["categoria"]) {

                case "Peón":
                    $clase = "peon";
                    break;

                case "Oficial":
                    $clase = "oficial";
                    break;

                case "Jefe Departamento":
                    $clase = "jefe";
                    break;

                case "Director":
                    $clase = "director";
                    break;
            }

        ?>

            <tr class="<?= $clase ?>">

                <td><?= $indiceAMostrar ?></td>

                <td><?= $empleado["nombre"] ?></td>

                <td><?= $empleado["apellidos"] ?></td>

                <td><?= $empleado["fecha_nacimiento"] ?></td>

                <td><?= $empleado["sueldo"] ?> €</td>

                <td><?= $empleado["categoria"] ?></td>

                <td><?= $empleado["sexo"] ?></td>

                <td><?= $empleado["aficiones"] ?></td>

                <td>

                    <a
                        href="https://www.google.com/search?q=<?= urlencode(basename($empleado["foto"])) ?>"
                        target="_blank"
                    >
                        <img src="<?= $empleado["foto"] ?>" width="60">
                    </a>

                </td>

                <td>
                    <?= $empleado["empleado"] ?>
                </td>

                <td>
                    <form action="listado.php" method="POST" class="formEliminar">
                        <button name="eliminar" value="<?=  $empleado['id'] ?>">
                            Eliminar
                        </button>
                    </form>
                </td>

            </tr>

        <?php endforeach; ?>


        <tr>

            <td colspan="4"><strong>Resumen</strong></td>

            <td>
                <strong><?= "Total: " . number_format($sumaSueldos, 2) ?> €</strong>
            </td>

            <td>
                <strong><?= "Media: " . number_format($media, 2) ?> €</strong>
            </td>

            <td colspan="5">

                Hombres:
                <?= number_format($porcentajeHombres, 2) ?>%

                <br>

                Mujeres:
                <?= number_format($porcentajeMujeres, 2) ?>%

            </td>

        </tr>

    </table>


    <div class="paginas">

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>

            <a href="?pagina=<?= $i ?>&items=<?= $itemsPorPagina ?>&orden=<?= $orden ?>&direccion=<?= $direccion ?>">
                <?= $i ?>
            </a>

        <?php endfor; ?>

        <a href="empleados.php">Insertar más empleados</a>

        <?= $mensaje ?>

    </div>

    <script src="script.js" defer></script>

</body>

</html>