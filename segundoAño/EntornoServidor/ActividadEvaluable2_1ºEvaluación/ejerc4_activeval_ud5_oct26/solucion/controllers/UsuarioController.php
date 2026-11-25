<?php
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController {
    public function listar() {
        $modelo = new UsuarioModel();
        $usuarios = $modelo->obtenerUsuarios();
        
        // Cargar la vista
        require_once __DIR__ . '/../views/usuario_view.php';
    }
}