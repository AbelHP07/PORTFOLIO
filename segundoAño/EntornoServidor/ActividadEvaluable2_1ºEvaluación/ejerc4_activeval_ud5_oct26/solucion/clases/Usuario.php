<?php
class Usuario {
    private $id;
    private $nombre;
    private $username;
    private $pwd;
    private $idNacion;
    private $idSuscrip;

    public function __construct($id, $nombre, $username, $pwd, $idNacion, $idSuscrip) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->idNacion = $idNacion;
        $this->idSuscrip = $idSuscrip;
    }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getPwd() { return $this->pwd; }
    public function setPwd($pwd) { $this->pwd = $pwd; }

    public function msg_general($msg) {
        return "Mensaje para " . $this->username . ": " . $msg;
    }
}