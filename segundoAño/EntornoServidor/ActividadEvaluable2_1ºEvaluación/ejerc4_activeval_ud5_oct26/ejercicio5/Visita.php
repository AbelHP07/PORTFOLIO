<?php
class Visita {
    private $idUser;
    private $idPag;
    private $fechaVis;
    private $horaVis;

    public function __construct($idUser, $idPag, $fechaVis, $horaVis) {
        $this->idUser = $idUser;
        $this->idPag = $idPag;
        $this->fechaVis = $fechaVis;
        $this->horaVis = $horaVis;
    }

    public function getIdUser() { return $this->idUser; }
    public function getIdPag() { return $this->idPag; }
    public function getFechaVis() { return $this->fechaVis; }
    public function getHoraVis() { return $this->horaVis; }
}
?>