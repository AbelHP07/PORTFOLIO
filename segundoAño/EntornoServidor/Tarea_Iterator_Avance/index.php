
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index.php</title>
</head>
<body>
  <?php

  include_once "MyIteratorArray.php";

  use Iterator1\MyIteratorArray;

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

  function printAll(iterable $myIterable){
    foreach($myIterable as ['titulo' => $titulo, 'disponible' => $disponible]){
      echo $titulo;
      if($disponible){
        echo ' (Sí)<br>';
      }else{
        echo ' (No)<br>';
      }
    }
  }

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

  // También podría hacerse con array_filter($array, fn($elemento) => $elemento['disponible'])

  // Use the iterator as an iterable
  // Usa el iterator como un iterable
  $iterator = new MyIteratorArray($catalogo);

  // Método 0 - Imprimir todos

  printAll($iterator);

  echo '====================<br>';

  // Método 1 - Imprimir sólo los disponibles

  printIterable($iterator);

  echo '====================<br>';

  // Método 2 - Buscar por posición

  $posicionBuscar = 3;

  ['titulo' => $titulo, 'disponible' => $disponible] = $iterator->search($posicionBuscar);

  echo $titulo != null ? $titulo.' - Posición: '.$iterator->key().'<br>' : 'Error, no hay posición: '.$posicionBuscar.'<br>';

  //echo '<br>'.$_SERVER['PHP_SELF'];    para devolver la página actual

  echo '====================<br>';

  // Método 3 - Buscar subcadena

  $cadena = 'de';

  $coincidencias = [];

  $coincidencias = $iterator->searchString($cadena);

  if(empty($coincidencias)){
    echo 'Error<br>';
  }else{
    foreach($coincidencias as ['item' => $libro, 'key' => $key]){
      echo $libro['titulo'].' - ';
      echo ($key+1).'<br>';
    }
  }

  echo '====================<br>';

  // Método 4 (mezcla 1 y 3) - Buscar por subcadena sólo los disponibles

  $subCadena = 'Co';

  $coinciden = [];

  $coinciden = $iterator->searchString($subCadena);

  echo ' | subcadena a buscar: '.$subCadena.'...<br>';

  foreach($coinciden as ['item' => $libro, 'key' => $key]){
    if($libro['disponible']){
      echo $libro['titulo'];
      echo ' (Sí) - ';
      echo ($key+1).'<br>';
    }
  }

  echo '====================<br>';

  // Añadir una función que se salga del número de elementos del puntero y se valide con el valid

  // Método 5

  try{
    for ($i = 0; $i <= count($catalogo); $i++) {
      $iterator->next();
    }

    if ($iterator->valid()) {
      $current = $iterator->current();
      echo 'Elemento actual: '.$current['titulo'].'<br>';
    } else {
      throw new Exception('Error (por arriba) con "next"<br>');
    }
  }catch(Exception $e){
    echo $e->getMessage();
  }

  try {
      $iterator->rewind();
      
      $iterator->prev();

      if ($iterator->valid()) {
        $current = $iterator->current();
        echo 'Elemento actual: ' . $current['titulo'] . '<br>';
      } else {
        throw new Exception('Error (por abajo) con "prev"<br>');
      }

  } catch (Exception $e) {
      echo $e->getMessage().'<br>';
  }

  ?>
</body>
</html>