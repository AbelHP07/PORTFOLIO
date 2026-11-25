<?php

include_once "clases/Usuario.php";
include_once "clases/UsuarioApp.php";
include_once "clases/IAdministrador.php";
include_once "clases/Administrador.php";

use POOUML\Usuario;
use POOUML\UsuarioApp;
use POOUML\IAdministrador;
use POOUML\Administrador;

$Usuario = new UsuarioApp("mensual");

$Usuario->set_nombre("Pepe");
$Usuario->set_pwd("12q34F");
$Usuario->set_username("Pepe1234");

echo '<hr>';
echo 'Datos Usuario';
echo '<hr>';
echo '<br>';

echo 'Nombre: '.$Usuario->get_nombre().'<br>';
echo 'Nombre de usuario: '.$Usuario->get_username().'<br>';
echo 'Contraseña de usuario: '.$Usuario->get_pwd().'<br>';
echo 'Tipo de suscripción: '.$Usuario->get_suscripcion().'<br><br>';

echo '<hr>';
echo 'Cambio de datos';
echo '<hr>';
echo '<br>';

$Usuario->set_nombre('Juan');
$Usuario->set_pwd('1111');
$Usuario->set_nombre('Juan1234');
$Usuario->set_suscripcion('anual');

echo 'Nombre: '.$Usuario->get_nombre().'<br>';
echo 'Nombre de usuario: '.$Usuario->get_username().'<br>';
echo 'Contraseña de usuario: '.$Usuario->get_pwd().'<br>';
echo 'Tipo de suscripción: '.$Usuario->get_suscripcion().'<br><br>';

echo 'Mensaje: '.$Usuario->msg_general('Este es el mensaje del usuario.');

echo '<hr>';
echo 'Datos Admin';
echo '<hr>';
echo '<br>';

$Admin = new Administrador(20,true);

$Admin->set_nombre("María");
$Admin->set_pwd("h1o1l1a1");
$Admin->set_username("María1234");

echo 'Nombre: '.$Admin->get_nombre().'<br>';
echo 'Nombre de usuario: '.$Admin->get_username().'<br>';
echo 'Contraseña: '.$Admin->get_pwd().'<br>';
echo 'Nivel: '.$Admin->get_nivel().'<br>';
echo $Admin->get_esempleado() ? '¿Es empleado?: Sí'.'<br><br>':'¿Es empleado?: No'.'<br><br>';

echo 'Mensaje: '.$Usuario->msg_general('Este es el mensaje del Administrador.');

$Admin->cambiar_nivel(12);

echo '<hr>';
echo 'Cambio Nivel';
echo '<hr>';
echo '<br>';

echo 'Nivel: '.$Admin->get_nivel();



?>