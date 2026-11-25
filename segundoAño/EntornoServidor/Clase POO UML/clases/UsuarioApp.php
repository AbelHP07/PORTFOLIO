<?php

namespace POOUML;

class UsuarioApp extends Usuario{
    private string $suscripcion;

    public function __construct(string $susc)
    {
        $this->suscripcion = $susc;
    }

    public function msg_general(string $msg): string{
        return $msg;
    }

    public function get_suscripcion(): string{
        return $this->suscripcion;
    }
    public function set_suscripcion(string $susc){
        $this->suscripcion = $susc;
    }
}

?>