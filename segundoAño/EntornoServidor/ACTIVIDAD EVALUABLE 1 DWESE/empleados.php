<?php

include_once "class/Sanear.php";
include_once "class/Empleado.php";
include_once "class/Conexion.php";

$empleado = new Empleado();

$pdo = Conexion::conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $datosEnviados = $_POST;

    $empleado->validar($_POST);

    if (!$empleado->tieneErrores()) {

        $empleadoCompleto = $empleado->getNombre() . " | "
            . $empleado->getApellidos() . " | "
            . $empleado->getFechaNac();


        $categoria = "";

        switch ($empleado->getCategoria()) {

            case "peon":
                $categoria = "Peón";
                break;

            case "oficial":
                $categoria = "Oficial";
                break;

            case "jefeDepto":
                $categoria = "Jefe Departamento";
                break;

            case "director":
                $categoria = "Director";
                break;
        }


        $consulta = $pdo->prepare("
            INSERT INTO empleados
            (nombre, apellidos, fecha_nacimiento, sueldo, categoria, sexo, aficiones, foto, empleado)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $consulta->execute([
            $empleado->getNombre(),
            $empleado->getApellidos(),
            $empleado->getFechaNac(),
            $empleado->getSueldo(),
            $categoria,
            ucfirst($empleado->getSexo()),
            implode(", ", $empleado->getAficiones()),
            $empleado->getFoto(),
            $empleadoCompleto
        ]);
    }
}

include_once "vista.php";

?>