<?php

class Book 
{
  private $id,
          $book,
          $name,
          $style,
          $color;

  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  //HYDRATE
  public function hydrate(array $donnees)
  {
    foreach($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  //GETTERS
  public function id()
  {
    return $this->id;
  }
  public function book()
  {
    return $this->book;
  }
  public function name()
  {
    return $this->name;
  }
  public function style()
  {
    return $this->style;
  }
  public function color()
  {
    return $this->color;
  }
  //SETTERS
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setBook($book)
  {
    $this->book = $book;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setStyle($style)
  {
    $this->style = $style;
  }
  public function setColor($color)
  {
    $this->color = $color;
  }
}