<?php

$nombre = $_POST["nombre"] ?? null;
$voto = $_POST["voto"] ?? null;

$fichero = "puntaje.txt";

if($nombre && $voto){
    $datos = $nombre."-".$voto;

    file_put_contents($fichero, $datos);
}

if(file_exists($fichero)){
    echo file_get_contents($fichero);
}

?>