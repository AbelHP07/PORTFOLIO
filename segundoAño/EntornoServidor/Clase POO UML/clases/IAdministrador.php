<?php

namespace POOUML;

interface IAdministrador{
    public function cambiar_nivel(int $n);
    public function cambiar_vinculacion_emp(string $ve);
}

?>