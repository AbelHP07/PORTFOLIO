CREATE DATABASE IF NOT EXISTS db_ejerc4_activeval_ud5_oct26;
USE db_ejerc4_activeval_ud5_oct26;

CREATE TABLE NACIONALIDAD (
    IdNacion INT AUTO_INCREMENT PRIMARY KEY,
    NombreNacion VARCHAR(25) NOT NULL
);

CREATE TABLE SUSCRIPCION (
    IdSuscrip INT AUTO_INCREMENT PRIMARY KEY,
    NombreSuscrip VARCHAR(15) NOT NULL
);

CREATE TABLE USUARIO (
    IdUser INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(15) NOT NULL,
    Username VARCHAR(12) NOT NULL,
    Password VARCHAR(12) NOT NULL,
    Email VARCHAR(40) NOT NULL,
    Sexo ENUM('Hombre', 'Mujer', 'Otro') NOT NULL,
    FechaNac DATE NOT NULL,
    Avatar BLOB,
    IdNacion INT,
    IdSuscrip INT,
    FOREIGN KEY (IdNacion) REFERENCES NACIONALIDAD(IdNacion),
    FOREIGN KEY (IdSuscrip) REFERENCES SUSCRIPCION(IdSuscrip)
);

CREATE TABLE PAGINA (
    IdPag INT AUTO_INCREMENT PRIMARY KEY,
    NombrePag VARCHAR(15) NOT NULL,
    Url VARCHAR(70) NOT NULL
);

CREATE TABLE VISITA (
    IdUser INT,
    IdPag INT,
    FechaVis DATE,
    HoraVis DATE,
    PRIMARY KEY (IdUser, IdPag),
    FOREIGN KEY (IdUser) REFERENCES USUARIO(IdUser),
    FOREIGN KEY (IdPag) REFERENCES PAGINA(IdPag)
);