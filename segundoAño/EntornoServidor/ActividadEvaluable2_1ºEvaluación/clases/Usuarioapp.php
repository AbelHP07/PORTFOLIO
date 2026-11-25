<?php

namespace Act21Ev;

// clase Usuarioapp (Hereda de Usuario)
class Usuarioapp extends Usuario {
    private $suscripcion; // relación con Suscripcion

    public function msg_general($msg) {
        return "Mensaje Usuarioapp: Clase " . $msg;
    }

    public function get_suscripcion() {
        return $this->suscripcion;
    }

    public function set_suscripcion($susc) {
        $this->suscripcion = $susc;
    }
}

?>