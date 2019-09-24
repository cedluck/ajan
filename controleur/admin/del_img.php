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
    
/*delete image*/
$table = $_GET['table'];
$id = $_GET['id'];
$img = $_GET['img_name'];
$count = $imageManager->imgCount($table);
$idBook = $bookManager->getIdBook($table);

if($count['images'] > 1)
{
    //Delete img from /img folder
    $imageManager->delImgFile($img);
    //Delete img from books table
    $image = $imageManager->getImg($table, $id);
    $imageManager->delete($image, $table);
    /*seek for active image*/
    $active = $imageManager->getActive($table, $id);
    if($active['id']==NULL)
    {
        $images = $imageManager->getImages($table);
        $imageManager->makeActive($table, $images[0]->id());
    }
    //Callback message   
    header('location:../../admin.php?message="'.$img.'" a bien été effacé du port-folio "'.$_GET['name'] .'" !#'.$idBook['id']);
}
else
{
     header('location:../../admin.php?message=Il ne vous reste plus qu\'une image dans le port-folio "'.$_GET['name'] .'" !<br>L\'image n\'a pas été effacée.#'.$idBook['id']);
}