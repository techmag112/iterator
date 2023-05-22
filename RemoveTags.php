<?php

class RemoveTags implements Iterator 
{
  private $position = 0;
  private $array = [];

  public function __construct($arr) {
      $this->position = 0;
      $this->array = $arr;
  }

  public function rewind(): void {
      $this->position = 0;
  }

  #[\ReturnTypeWillChange]
  public function current() {
      return $this->array[$this->position];
  }

  #[\ReturnTypeWillChange]
  public function key() {
      return $this->position;
  }

  public function next(): void {
      do {
          ++$this->position;
      } while (($this->valid()) && ($this->checkTags($this->current())));
  }

  public function valid(): bool {
      return isset($this->array[$this->position]);
  }

  private function checkTags($str): bool {
    if ((strpos($str, '<meta name="keywords"') !== false ) || (strpos($str, '<meta name="description"') !== false ) || (strpos($str, '<title>') !== false ) || (strpos($str, '</title>') !== false )) {
        return true;
    } 
    return false;
  }

}