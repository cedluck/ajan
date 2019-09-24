<?php

class ImageManager
{
  private $_db;
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function addImage(Image $image, $table)
  {
    $sql = 'INSERT INTO '. $table.'(img_name, is_active) VALUES (:img_name, :is_active)';
    $q = $this->_db ->prepare($sql);                   
    $q->bindValue(':img_name', $image->imgName(), PDO::PARAM_INT);
    $q->bindValue(':is_active', $image->isActive(), PDO::PARAM_INT);
    $q->execute();
  }

  public function delete(Image $image, $table)
  {
    $sql = 'DELETE FROM '. $table.' WHERE id='.$image->id();
    $q = $this->_db ->prepare($sql);                
    $q ->execute();
  }

  public function delImgFile($img)
  {
    $old = getcwd(); 
    chdir('../../img');
    unlink($img);
    chdir($old);
  }
  
  public function checkFile($img)
  {
    $old = getcwd(); 
    chdir('../../img');
    $fileExists = file_exists($img);
    chdir($old);
    return $fileExists;
  }

  public function getImages($table)
  {
    $images = [];
    $q = $this->_db->query('SELECT id, img_name, is_active FROM '.$table);
    while($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $images[] = new Image($donnees);
    }
    return $images;
  }

  public function getImg($table, $id)
  {
    $q = $this->_db->query('SELECT id, img_name, is_active FROM '.$table.' WHERE id='.$id);
    $img = $q->fetch(PDO::FETCH_ASSOC);    
    return new Image($img);
  }

  public function makeActive($table, $id)
  {
    $q = $this->_db->query('UPDATE '.$table.' SET is_active="active" WHERE id='.$id);
  }

  public function makeUnactive($table, $id)
  {
    $q = $this->_db->query('UPDATE '.$table.' SET is_active="" WHERE id='.$id);
  }

  public function getActive($table)
  {
   $q = $this->_db->query('SELECT id, img_name FROM '.$table.' WHERE is_active="active"');
   $active = $q->fetch(PDO::FETCH_ASSOC);
   return $active;
  }

  public function imgCount($table)
  {
    $q = $this->_db->query('SELECT COUNT(img_name) AS images FROM '.$table);
    $count = $q->fetch(PDO::FETCH_ASSOC);
    return $count;
  }

  public function changeColor($thecolor, $id)
  {
    $q = $this->_db->query('UPDATE books SET color="'.$thecolor.'" WHERE id='.$id);
  }

  public function changeStyle($thestyle, $id)
  {
    $q = $this->_db->query('UPDATE books SET style="'.$thestyle.'" WHERE id='.$id);
  }
  
  public function moveImage($table, $id, $newId)
  {
    $img1 = $this->getImg($table, $id);
    $img2 = $this->getImg($table, $newId);
    $q1 = $this->_db->query('UPDATE '.$table.' SET img_name="'.$img1->imgName() .'", is_active="'.$img1->isActive().'" WHERE id='.$newId);   
    $q2 = $this->_db->query('UPDATE '.$table.' SET img_name="'.$img2->imgName() .'", is_active="'.$img2->isActive().'" WHERE id='.$id);
  }
}