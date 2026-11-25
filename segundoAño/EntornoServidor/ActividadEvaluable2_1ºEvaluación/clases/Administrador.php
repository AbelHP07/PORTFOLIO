<?php

namespace Act21Ev;

// clase Administrador (Hereda de Usuario e implementa IAdministrador)
class Administrador extends Usuario implements IAdministrador {
    private $nivel;
    private $empleado;

    public function msg_general($msg) {
        return "Mensaje Administrador: Clase " . $msg;
    }

    public function get_nivel() { return $this->nivel; }
    public function set_nivel($n) { $this->nivel = $n; }
    public function get_empleado() { return $this->empleado; }
    public function set_empleado($b) { $this->empleado = $b; }

    public function cambiar_nivel($n) {
        $this->nivel = $n;
    }

    public function cambiar_vinculacion_empl($ve) {
        $this->empleado = $ve;
    }
}

?>