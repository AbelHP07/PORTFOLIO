<?php

namespace POOUML;

abstract class Usuario {
    private string $nombre;
    private string $username;
    private string $pwd;

    public abstract function msg_general(string $msg): string;

    public function get_nombre(): string{
        return $this->nombre;
    }
    public function set_nombre(string $nom){
        $this->nombre = $nom;
    }

    public function get_username(): string{
        return $this->username;
    }
    public function set_username(string $un){
        $this->username = $un;
    }

    public function get_pwd(): string{
        return $this->pwd;
    }
    public function set_pwd(string $pwd){
        $this->pwd = $pwd;
    }
}

?>