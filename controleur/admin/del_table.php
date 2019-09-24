<?php

include_once('../../modele/connexion_sql.php');

$id = $_GET['id'];
$table = $_GET['table'];
function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');  
spl_autoload_register('chargerClasse');

$imageManager = new ImageManager($bdd);
$images  = $imageManager->getImages($table);
//delete from /img folder
foreach($images as $image)
{
  $imageManager->delImgFile($image->imgName());
}

$manager = new BookManager($bdd);
$manager->delFromBooks($id);


header('location:/ajanpoo/admin.php?message=Le port-folio "'.$_GET['name'].'" à bien été effacé !');