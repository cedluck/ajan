<?php
session_start();

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location:../ajanpoo/admin.php');
  exit();
}
/*header*/
function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('modele/admin');     
spl_autoload_register('chargerClasse');

//create Manager objects
$bookManager = new BookManager($bdd);
$imageManager = new ImageManager($bdd);

//get outputs objects
$showcase = $bookManager->getShowcase();
$books = $bookManager->getBooks();
$respons = $bookManager->getAdministrator();

include_once('C:\MAMP\htdocs\ajanpoo\vue\admin\administration.php');

if(isset($_POST['name']) AND isset($_POST['pass']))
{
  $_SESSION['name']=$_POST['name'];
  $_SESSION['pass']=$_POST['pass'];
}

if(isset($_SESSION['name']) AND isset($_SESSION['pass']))
{  
  if($respons['name'] == $_SESSION['name'] AND $respons['pass'] == sha1($_SESSION['pass']))
  {
    include_once('C:\MAMP\htdocs\ajanpoo\vue\admin\header.php');
    foreach($books as $key => $book)
    {
      $thebook = $book->book();
      $thename = $book->name();
      $theid = $book->id();
      $thestyle = $book->style();
      $thecolor = $book->color();
      $donnees = $imageManager->getImages($thebook);
      include('C:\MAMP\htdocs\ajanpoo\vue\admin\content.php');  
    }
    include('C:\MAMP\htdocs\ajanpoo\vue\admin\footer.php');
  }
}


