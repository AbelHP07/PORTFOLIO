<?php

include_once "MyIteratorArray.php";

/*
Imagina que tienes una colección de libros y quieres recorrerla con un bucle foreach
omitiendo automáticamente aquellos que no están 
*/

/*
Array de pruebas

$catalogo = [
  ['titulo' => 'PHP Avanzado', 'disponible' => false],
  ['titulo' => 'Patrones de diseño', 'disponible' => true],
  ['titulo' => 'Clean Code', 'disponible' => true],
  ['titulo' => 'Legacy Code', 'disponible' => false]
]
*/

$catalogo = [
  ['titulo' => 'PHP Avanzado', 'disponible' => false],
  ['titulo' => 'Patrones de diseño', 'disponible' => true],
  ['titulo' => 'Clean Code', 'disponible' => true],
  ['titulo' => 'Legacy Code', 'disponible' => false]
];

// A function that uses iterables
// Una función que usa iterables
function printIterable(iterable $myIterable) {
  foreach($myIterable as ['titulo' => $titulo, 'disponible' => $disponible]) {
    if($disponible){
      echo $titulo;
      echo ' (Sí)<br>';
    }
  }
}

// También podría hacerse con array_filter($array, fn($elemento) => $elemento['disponible])

// Use the iterator as an iterable
// Usa el iterator como un iterable
$iterator = new MyIteratorArray($catalogo);
printIterable($iterator);

?>