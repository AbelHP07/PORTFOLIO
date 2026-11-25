CREATE DATABASE IF NOT EXISTS db_abel_hernandez;
USE db_abel_hernandez;

CREATE TABLE nacionalidad (
    IdNacion INT AUTO_INCREMENT PRIMARY KEY,
    NombreNacion VARCHAR(25) NOT NULL
);

CREATE TABLE suscripcion (
    IdSuscrip INT AUTO_INCREMENT PRIMARY KEY,
    NombreSuscrip VARCHAR(15) NOT NULL
);

CREATE TABLE pagina (
    IdPag INT AUTO_INCREMENT PRIMARY KEY,
    NombrePag VARCHAR(15) NOT NULL,
    Url VARCHAR(70) NOT NULL
);

CREATE TABLE usuario (
    IdUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    IdNacion INT,
    IdSuscrip INT,
    FOREIGN KEY (IdNacion) REFERENCES nacionalidad(IdNacion),
    FOREIGN KEY (IdSuscrip) REFERENCES suscripcion(IdSuscrip)
);

-- Inserción de un registro por entidad
INSERT INTO nacionalidad (NombreNacion) VALUES ('Española');
INSERT INTO suscripcion (NombreSuscrip) VALUES ('Premium');
INSERT INTO pagina (NombrePag, Url) VALUES ('Inicio', 'index.php');
INSERT INTO usuario (nombre, username, pwd, IdNacion, IdSuscrip) 
VALUES ('Abel Hernández', 'abelhp', '123456', 1, 1);