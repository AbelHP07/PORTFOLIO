<?php
class Nacionalidad {
    private $idNacion;
    private $nombreNacion;

    public function __construct($idNacion, $nombreNacion) {
        $this->idNacion = $idNacion;
        $this->nombreNacion = $nombreNacion;
    }

    public function getIdNacion() { return $this->idNacion; }
    public function getNombreNacion() { return $this->nombreNacion; }
    public function setNombreNacion($nombreNacion) { $this->nombreNacion = $nombreNacion; }
}