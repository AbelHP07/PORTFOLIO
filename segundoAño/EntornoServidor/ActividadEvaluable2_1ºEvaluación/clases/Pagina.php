<?php

namespace Act21Ev;

// Entidad Pagina
class Pagina {
    private $idPag;
    private $nombrePag;
    private $url;

    public function __construct($nombrePag, $url) {
        $this->nombrePag = $nombrePag;
        $this->url = $url;
    }
}

?>