<?php
function chargerClasse($classe)
{
  require $classe . '.php'; 
}
    
spl_autoload_register('chargerClasse');



$book = new Book([
  'book' => uniqid(),
  'name' => 'lily',
  'style' => 'black',
  'color' => 'purple'
]);

$db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=test', 'root', 'root');
$manager = new BookManager($db);

$manager->addBook($book);
$thebook = $manager->getBook(56);


echo $thebook['id'].'<br>';
echo $thebook['book'].'<br>';
echo $thebook['name'].'<br>';
echo $thebook['style'].'<br>';
echo $thebook['color'].'<br>';

// $manager->delFromBooks(89);
