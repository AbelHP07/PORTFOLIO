<?php
// Create an Iterator
class MyIteratorArray implements Iterator {
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

  public function previous(): void {
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
    return $this->pointer < count($this->items);
  }
}
?>