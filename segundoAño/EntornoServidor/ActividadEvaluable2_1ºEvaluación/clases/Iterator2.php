<?php

namespace Iterator2;

// current, next, key, valid, rewind

class Iterator2 implements \Iterator{
    private array $items;
    private int $pointer = 0;

    public function __construct(array $items){
        $this->items = array_values($items);
    }

    public function current(): mixed{
        return $this->items[$this->pointer];
    }

    public function key(): mixed{
        return $this->pointer;
    }

    public function next(): void{
        ++$this->pointer;
    }

    public function prev(): void{
        --$this->pointer;
    }

    public function rewind(): void{
        $this->pointer = 0;
    }

    public function valid(): bool{
        return isset($this->items[$this->pointer]);
    }
}

?>