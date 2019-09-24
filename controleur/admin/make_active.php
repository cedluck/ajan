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

$active = $imageManager->getActive($table);
$imageManager->makeUnactive($table, $active['id']);
$imageManager->makeActive($table, $id);
$idBook = $bookManager->getIdBook($table);

header('location:../../admin.php?message="'.$_GET['img_name'].'" est l\'image de fond du port-folio "'.$_GET['name'].'"#'.$idBook['id']);
