<?php

include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
require $classe . '.php'; 
}
chdir('../../modele/admin');    
spl_autoload_register('chargerClasse');

$bookManager = new BookManager($bdd);

$name = $_GET['name'];
$id = $_GET['id'];
$books = $bookManager->getBooks();

foreach($books as $key => $book)
{
    if($book->id() == $id)
    {
        if($key < count($books)-1)
        {
            $newId = $books[$key+1]->id();
            $bookManager->moveBook($id, $newId);

            header('location:/ajanpoo/admin.php?message=Le port-folio "'.$name.'" à été descendu d\'un cran.#'.$newId);
        }
        else
        {
            header('location:/ajanpoo/admin.php?message=Vous ne pouvez pas faire ça !#'.$id);
        }
    }
}

