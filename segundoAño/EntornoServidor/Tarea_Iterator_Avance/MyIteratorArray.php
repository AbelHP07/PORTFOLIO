<?php
namespace Iterator1;

// Create an Iterator
class MyIteratorArray implements \Iterator {
  private $items = [];
  private $pointer = 0;

  public function __construct($items) {
    // array_values() makes sure that the keys are numbers
    // array_values() se asegura que las claves sean números
    $this->items = array_values($items);
  }

  public function current(): mixed {
    // Devuelve valor actual del puntero
    return $this->items[$this->pointer];
  }

  public function key(): int {
    // Devuelve el valor actual de la clave
    return $this->pointer;
  }

  public function next(): void {
    // Avanza al siguiente elemento del array
    $this->pointer++;
  }

  public function prev(): void {
    // Vuelve al elemento anterior del array
    $this->pointer--;
  }

  public function rewind(): void {
    // Vuelve a la posición inicial del puntero
    $this->pointer = 0;
  }

  public function valid(): bool {
    // count() indicates how many items are in the list
    // count() indica cuántas items hay en la lista
    return $this->pointer >= 0 && $this->pointer < count($this->items);
  }

  public function search(int $position): mixed{
    if (isset($this->items[$position])) {
      $this->pointer = $position; // Sincronizamos el puntero
      return $this->items[$position];
    }
    return null;
  }

  public function searchString(string $cadena): mixed{
      $libros = [];

      // empezamos por el inicio del puntero
      // luego validamos que siga habiendo elementos en el iterador, si no hay, sale del for
      // avanzamos de 1 en 1 (usando el método next, para utilizar el puntero)
      //      i=0   ;   i<count($libros)  ;  i++
      for($this->rewind();$this->valid();$this->next()){
        $libroActual = $this->current();

        if(str_contains($libroActual['titulo'], $cadena)){
          $libros[] = [
            'item' => $libroActual,
            'key' => $this->key()
          ];
        }
      }

      return $libros;
    }
  }
?>