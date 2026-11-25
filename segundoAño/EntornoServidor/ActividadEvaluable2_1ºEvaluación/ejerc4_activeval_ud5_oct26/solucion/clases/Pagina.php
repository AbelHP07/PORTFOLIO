<?php
class Pagina {
    private $idPag;
    private $nombrePag;
    private $url;

    public function __construct($idPag, $nombrePag, $url) {
        $this->idPag = $idPag;
        $this->nombrePag = $nombrePag;
        $this->url = $url;
    }

    public function getIdPag() { return $this->idPag; }
    public function getNombrePag() { return $this->nombrePag; }
    public function getUrl() { return $this->url; }
}