<?php
include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');     
spl_autoload_register('chargerClasse');

$bookManager = new BookManager($bdd);

if(($_POST['site'] AND $_POST['presentation'] AND $_FILES['monfichier']['name'])!=NULL)
{
    $site = htmlspecialchars($_POST['site']);
    $presentation = htmlspecialchars($_POST['presentation']);
    $showcase = htmlspecialchars($_FILES['monfichier']['name']);
    include_once('../../modele/admin/add_img.php');
    $bookManager->addShowcase($site, $presentation, $showcase);
    header('location:/ajanpoo/admin.php?message=Page d\'accueil créé !');
}
else
{
    header('location:/ajanpoo/admin.php?message=Remplissez tous les champs de saisie !');
}