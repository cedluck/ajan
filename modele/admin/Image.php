<?php

class Image 
{
  private $id,
          $img_name,
          $is_active;

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
  public function imgName()
  {
    return $this->img_name;
  }
  public function isActive()
  {
    return $this->is_active;
  }
  //SETTERS
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setimg_name($img_name)
  {
    $this->img_name = $img_name;
  }
  public function setis_active($is_active)
  {
    $this->is_active = $is_active;
  }
 }