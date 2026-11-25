<?php

namespace Act21Ev;

// Entidad Suscripcion
class Suscripcion {
    private $idSuscrip;
    private $nombreSuscrip;

    public function __construct($nombreSuscrip) {
        $this->nombreSuscrip = $nombreSuscrip;
    }
}

?>