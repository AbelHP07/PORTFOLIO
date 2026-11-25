<?php
class Suscripcion {
    private $idSuscrip;
    private $nombreSuscrip;

    public function __construct($idSuscrip, $nombreSuscrip) {
        $this->idSuscrip = $idSuscrip;
        $this->nombreSuscrip = $nombreSuscrip;
    }

    public function getIdSuscrip() { return $this->idSuscrip; }
    public function getNombreSuscrip() { return $this->nombreSuscrip; }
    public function setNombreSuscrip($nombreSuscrip) { $this->nombreSuscrip = $nombreSuscrip; }
}