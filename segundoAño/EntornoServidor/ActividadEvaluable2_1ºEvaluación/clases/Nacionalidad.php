<?php

namespace Act21Ev;

// Entidad Nacionalidad
class Nacionalidad {
    private $idNacion;
    private $nombreNacion;

    public function __construct($nombreNacion) {
        $this->nombreNacion = $nombreNacion;
    }
}

?>