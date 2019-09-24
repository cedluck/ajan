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

$img = htmlspecialchars($_FILES['monfichier']['name']);   
$fileExists = $imageManager->checkFile($img);

if($fileExists != 1)
{  
  include_once('../../modele/admin/add_img.php');
  //create new image object
  $image = new Image([
    'img_name' => $img,
    'is_active' => ''
  ]);
	//add image in table 
  $imageManager->addImage($image, $_POST['table']);
  $idBook = $bookManager->getIdBook($_POST['table']);
  header('location:/ajanpoo/admin.php?message="'.$img.'" a bien été ajouté au port-folio "'.$_GET['name'].'"#'.$idBook['id']);
}
else
{
  $idBook = $bookManager->getIdBook( $_POST['table']);
  header('location:/ajanpoo/admin.php?message="'.$_FILES['monfichier']['name'].'" existe déjà, changer le nom de l\'image <br>(l\'image n\'a pas été enregistrée.)#'.$idBook['id']);
}