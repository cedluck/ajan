<?php

include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');     
spl_autoload_register('chargerClasse');

$thestyle = $_GET['style'];
$id = $_GET['id'];
$styles = array('transp', 'black', 'dark', 'light');

foreach($styles as $style)
{
    $styl = ($thestyle == current($styles)) ? current($styles) : next($styles);
}
$thestyle = next($styles);
if($thestyle==Null)
{
    reset($styles);
}
$thestyle = current($styles);

$imageManager = new ImageManager($bdd);
$imageManager->changeStyle($thestyle, $id);

header('location:../../admin.php#'.$id);