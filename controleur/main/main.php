<?php
// echo 'controleur connecté...';
function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('modele/admin');     
spl_autoload_register('chargerClasse');

$bookManager = new BookManager($bdd);
$imageManager = new ImageManager($bdd);
$books = $bookManager->getBooks();
$showcase = $bookManager->getShowcase();
/*header*/
include_once('C:\MAMP\htdocs\ajanpoo\vue\main\header.php');
/*section*/

foreach($books as $key => $book)
{
    $thebook = $book->book();
    $thename = $book->name();
    $theid = $book->id();
    $thestyle = $book->style();
    $thecolor = $book->color();
    if($key+1 < count($books))
    {
       $thenextbook = $books[$key+1]->book(); 
    }    
    $images = $imageManager->getImages($thebook);
    $theactive = $imageManager->getActive($thebook);
    include('C:\MAMP\htdocs\ajanpoo\vue\main\book.php');  
}
/*footer*/
include('C:\MAMP\htdocs\ajanpoo\vue\main\footer.php');
