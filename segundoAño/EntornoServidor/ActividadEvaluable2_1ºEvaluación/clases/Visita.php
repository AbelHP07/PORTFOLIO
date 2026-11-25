<?php

namespace Act21Ev;

// Entidad Visita (Relaciona Usuarioapp y Pagina)
class Visita {
    private $fechaVis;
    private $horaVis;
    private $usuarioapp;
    private $pagina;

    public function __construct($fechaVis, $horaVis, $usuarioapp, $pagina) {
        $this->fechaVis = $fechaVis;
        $this->horaVis = $horaVis;
        $this->usuarioapp = $usuarioapp;
        $this->pagina = $pagina;
    }
}