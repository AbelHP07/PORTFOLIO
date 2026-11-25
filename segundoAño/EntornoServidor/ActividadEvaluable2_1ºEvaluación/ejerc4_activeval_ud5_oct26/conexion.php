<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "db_ejerc4_activeval_ud5_oct26";  //"sistema_web";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8");
?>