<?php
// echo 'salut get_images';
function get_active($table)
{
  global $bdd;

  $sql = 'SELECT img_name FROM '.$table.' WHERE is_active="active"';
    
  $req = $bdd->prepare($sql);
  $req->execute();
  $active = $req->fetchAll();
  $req ->closeCursor();
 
  return $active;
}