<?php
// echo 'salut get_images';
function get_images($table)
{
  global $bdd;
  
  $sql = 'SELECT id, img_name, is_active FROM '.$table;
    
  $req = $bdd->prepare($sql);
  $req->execute();
  $donnees = $req->fetchAll();
  $req ->closeCursor();
  // print_r ($donnees);
  return $donnees;
}
