<?php

include_once "interfaces/IAdministrador.php";
include_once "clases/Usuario.php";
include_once "clases/Administrador.php";
include_once "clases/Nacionalidad.php";
include_once "clases/Pagina.php";
include_once "clases/Suscripcion.php";
include_once "clases/Usuarioapp.php";
include_once "clases/Visita.php";
include_once "clases/Iterator2.php";

use Iterator2\Iterator2;
use Act21Ev\Administrador;
use Act21Ev\Nacionalidad;
use Act21Ev\Pagina;
use Act21Ev\Suscripcion;
use Act21Ev\Usuario;
use Act21Ev\Usuarioapp;
use Act21Ev\Visita;
use Act21Ev\IAdministrador;

$usuarioPrueba = new Usuarioapp('Pepe','Pepe123',1234,'Español');

$administradorPrueba = new Administrador('Juan','Juan123',4321,'Francés');

$catalogo = [
    ['titulo' => 'PHP Avanzado', 'disponible' => false],
    ['titulo' => 'Patrones de diseño', 'disponible' => true],
    ['titulo' => 'Clean Code', 'disponible' => true],
    ['titulo' => 'Legacy Code', 'disponible' => false]
];

$iterablePrueba = new Iterator2($catalogo);

// str_contains($texto, $subcadena) -- Devuelve true si el texto contiene la subcadena

                                                // el '?' hace que se pueda poner 'null' como parámetro $subcadena
                                                // y el '= null' hace que se pueda dejar vacío el parámetro
function printIterable(iterable $miIterable, int $modo, ?string $subcadena = null): void{
    switch($modo){
        case 0:
            for($miIterable->rewind();$miIterable->valid();$miIterable->next()){
                echo $miIterable->current()['titulo'].' - '.($miIterable->current()['disponible']? 'Disponible: Sí' : 'Disponible: No').'<br>';
            }
         break;
        case 1:
            for($miIterable->rewind();$miIterable->valid();$miIterable->next()){
                echo $miIterable->current()['disponible']
                ? $miIterable->current()['titulo'].' - Disponible: Sí <br>'
                : '';
            }
         break;
        case 2:
            if($subcadena !== null){
                for($miIterable->rewind();$miIterable->valid();$miIterable->next()){
                    echo str_contains($miIterable->current()['titulo'], $subcadena)
                    ? ($miIterable->current()['titulo'].' - '.($miIterable->current()['disponible'] ? 'Disponible: Sí' : 'Disponible: No').' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp; '. $subcadena.'<br>')
                    : '';
                }
            }
         break;
        case 3:
            if($subcadena !== null){
                for($miIterable->rewind();$miIterable->valid();$miIterable->next()){
                    echo str_contains($miIterable->current()['titulo'], $subcadena)
                    ? ($miIterable->current()['disponible'] ? $miIterable->current()['titulo'].' - Disponible: Sí &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp; '. $subcadena.'<br>' : '')
                    : '';
                }
            }
         break;
        default:
            echo "Modo no disponible";
         break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act2 1ºEval</title>
</head>
<body>
    <p><?= $usuarioPrueba->msg_general("'".get_class($usuarioPrueba)."'").' <em>(namespace\nombreClase)</em>' ?></p>
    <p><?= $administradorPrueba->msg_general("'".get_class($administradorPrueba)."'").' <em>(namespace\nombreClase)</em>' ?></p>

    <hr>

    <?php

    echo 'Modo 0 - Todo el array: <br><br>';

    printIterable($iterablePrueba, 0);

    echo '<hr>';

    echo 'Modo 1 - Solo disponibles: <br><br>';

    printIterable($iterablePrueba, 1);

    echo '<hr>';

    echo 'Modo 2 - ¿Contiene subcadena?: <br><br>';

    printIterable($iterablePrueba, 2, 'Code');

    echo '<hr>';

    echo 'Modo 3 - Todo el array: <br><br>';

    printIterable($iterablePrueba, 3, 'Code');

    echo '<hr>';

    echo 'En caso de no estar disponible el modo <br><br>';

    printIterable($iterablePrueba, 6, 'Code');

    ?>
</body>
</html>