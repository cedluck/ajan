<?php

include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');     
spl_autoload_register('chargerClasse');

$newname = htmlspecialchars($_POST['newname']);
$id = $_POST['id'];


$bookManager = new BookManager($bdd);
if($newname!=NULL)
{
  $bookManager->changeName($newname, $id);
  header('location:../../admin.php?message="Le titre du port folio à été changer."#'.$id);
}
else
{
   header('location:../../admin.php?message="Renseignez un nouveau titre."#'.$id);
}



