<?php
function get_books()
{
  global $bdd;
  
  $req = $bdd->prepare('SELECT id, book, name, style, color FROM books');
  $req->execute();
  $books = $req->fetchAll();

  return $books;
}