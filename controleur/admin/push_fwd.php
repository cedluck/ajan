<?php

include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
require $classe . '.php'; 
}
chdir('../../modele/admin');    
spl_autoload_register('chargerClasse');


$imageManager = new ImageManager($bdd);
$bookManager = new BookManager($bdd);

$table = $_GET['table'];
$id = $_GET['id'];
$img = $_GET['img'];
$images = $imageManager->getImages($table);
$idBook = $bookManager->getIdBook($table);

foreach($images as $key => $image)
{  
    if($image->id() == $id)
    {
        if($key < count($images)-1)
        {            
            $newId = $images[$key+1]->id();
            $imageManager->moveImage($table, $id, $newId);
            header('location:/ajanpoo/admin.php?message="'.$img.'" à été reculé dans le carousel.#'.$idBook['id']);
        }
        else
        {
           header('location:/ajanpoo/admin.php?message=Vous ne pouvez pas faire ça !#'.$idBook['id']);
        }   
    }   
}