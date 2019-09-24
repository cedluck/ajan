<?php

include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');     
spl_autoload_register('chargerClasse');

$thecolor = $_GET['color'];
$id = $_GET['id'];
$colors = array('light', 'purple', 'dark', 'blue', 'sun', 'sea', 'leaf');

foreach($colors as $color)
{
    $col = ($thecolor == current($colors)) ? current($colors) : next($colors);
}
$thecolor = next($colors);
if($thecolor==Null)
{
    reset($colors);
}
$thecolor = current($colors);

$imageManager = new ImageManager($bdd);
$imageManager->changeColor($thecolor, $id);

 header('location:../../admin.php#'.$id);