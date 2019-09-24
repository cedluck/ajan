<?php

function get_showcase()
{
  global $bdd;
  
  $sql = 'SELECT * FROM showcase';
    
  $req = $bdd->prepare($sql);
  $req->execute();
  $site = $req->fetchAll();
  $req ->closeCursor();
 
  return $site;
}
