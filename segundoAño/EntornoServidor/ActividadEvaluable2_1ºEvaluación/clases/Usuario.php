<?php

namespace Act21Ev;

// clase abstracta Usuario
abstract class Usuario {
    protected $nombre;
    protected $username;
    protected $pwd;
    protected $nacionalidad; // relación con Nacionalidad

    public function __construct($nombre, $username, $pwd, $nacionalidad) {
        $this->nombre = $nombre;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->nacionalidad = $nacionalidad;
    }

    abstract public function msg_general($msg);

    // getters y setters básicos
    public function get_nombre() { return $this->nombre; }
    public function set_nombre($n) { $this->nombre = $n; }
    public function get_username() { return $this->username; }
    public function set_username($n) { $this->username = $n; }
    public function get_pwd() { return $this->pwd; }
    public function set_pwd($pwd) { $this->pwd = $pwd; }

}

?>