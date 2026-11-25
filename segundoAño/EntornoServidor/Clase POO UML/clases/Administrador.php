<?php

namespace POOUML;

class Administrador extends Usuario implements IAdministrador{
    private int $nivel;
    private bool $esempleado;

    public function __construct(int $niv, bool $es)
    {
        $this->nivel = $niv;
        $this->esempleado = $es;
    }

    public function msg_general(string $msg): string{
        return $msg;
    }

    public function get_nivel(): int{
        return $this->nivel;
    }
    public function set_nivel(int $n){
        $this->nivel = $n;
    }

    public function get_esempleado(): bool{
        return $this->esempleado;
    }
    public function set_esempleado(bool $es){
        $this->esempleado = $es;
    }

    public function cambiar_nivel(int $n){
        $this->nivel = $n;
    }
    public function cambiar_vinculacion_emp(string $ve){
        
    }
}

?>