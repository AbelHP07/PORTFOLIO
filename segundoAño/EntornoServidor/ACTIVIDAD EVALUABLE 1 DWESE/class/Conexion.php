<?php

class Conexion
{
    public static function conectar()
    {
        $host = "localhost";
        $bd = "empleados_bd";
        $usuario = "root";
        $clave = "";

        $pdo = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $usuario, $clave);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

/*

CREATE DATABASE IF NOT EXISTS empleados_bd
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE empleados_bd;

CREATE TABLE IF NOT EXISTS empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    sueldo DECIMAL(7,2) NOT NULL,
    categoria VARCHAR(20) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    aficiones VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    empleado VARCHAR(200) NOT NULL
);

INSERT INTO empleados 
(nombre, apellidos, fecha_nacimiento, sueldo, categoria, sexo, aficiones, foto, empleado) VALUES
('Carlos', 'Ruiz Mora', '1985-03-12', 1100, 'Peón', 'Hombre', 'Deportes, Cine', 'img/hombre.png', 'Carlos | Ruiz Mora | 1985-03-12'),
('Lucia', 'Fernandez Gil', '1992-07-21', 1300, 'Oficial', 'Mujer', 'Lectura, Música', 'img/mujer.png', 'Lucia | Fernandez Gil | 1992-07-21'),
('Miguel', 'Torres Vega', '1978-11-05', 2100, 'Jefe Departamento', 'Hombre', 'Deportes, Idiomas', 'img/hombre.png', 'Miguel | Torres Vega | 1978-11-05'),
('Elena', 'Navarro Ortiz', '1980-01-30', 2800, 'Director', 'Mujer', 'Idiomas', 'img/mujer.png', 'Elena | Navarro Ortiz | 1980-01-30'),
('Javier', 'Molina Cano', '1995-09-14', 700, 'Peón', 'Hombre', 'Música, Lectura', 'img/hombre.png', 'Javier | Molina Cano | 1995-09-14'),
('Sara', 'Jimenez Prieto', '1999-04-02', 1000, 'Oficial', 'Mujer', 'Cine, Deportes', 'img/mujer.png', 'Sara | Jimenez Prieto | 1999-04-02'),
('David', 'Castro Leon', '1970-12-19', 1900, 'Jefe Departamento', 'Hombre', 'Lectura, Cine', 'img/hombre.png', 'David | Castro Leon | 1970-12-19'),
('Marta', 'Romero Blanco', '1988-06-27', 2500, 'Director', 'Mujer', 'Lectura, Idiomas', 'img/mujer.png', 'Marta | Romero Blanco | 1988-06-27'),
('Pablo', 'Serrano Diaz', '2001-02-08', 650, 'Peón', 'Hombre', 'Deportes, Música', 'img/hombre.png', 'Pablo | Serrano Diaz | 2001-02-08'),
('Laura', 'Gomez Santos', '1983-10-16', 1450, 'Oficial', 'Mujer', 'Música', 'img/mujer.png', 'Laura | Gomez Santos | 1983-10-16'),
('Andres', 'Vargas Rey', '1975-08-23', 2400, 'Jefe Departamento', 'Hombre', 'Deportes, Lectura, Cine', 'img/hombre.png', 'Andres | Vargas Rey | 1975-08-23'),
('Irene', 'Campos Soto', '1990-05-11', 3000, 'Director', 'Mujer', 'Cine, Idiomas', 'img/mujer.png', 'Irene | Campos Soto | 1990-05-11');

*/
?>