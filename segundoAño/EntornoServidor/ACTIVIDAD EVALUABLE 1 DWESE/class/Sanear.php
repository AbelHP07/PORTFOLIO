<?php
class Sanear {
    public static function sanear($dato){
        $dato = trim($dato);
        $dato = stripslashes($dato);

        return $dato;
    }
}
?>