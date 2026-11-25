<?php
require_once __DIR__ . '/../conexion.php';
require_once __DIR__ . '/../clases/Usuario.php';

class UsuarioModel {
    public function obtenerUsuarios() {
        $db = conectarBD();
        $stmt = $db->query("SELECT * FROM usuario");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $usuarios = [];
        foreach ($resultados as $row) {
            $usuarios[] = new Usuario(
                $row['IdUsuario'], 
                $row['nombre'], 
                $row['username'], 
                $row['pwd'], 
                $row['IdNacion'], 
                $row['IdSuscrip']
            );
        }
        return $usuarios;
    }
}