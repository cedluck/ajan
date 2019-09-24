<?php

class BookManager
{
  private $_db;
  
  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function getAdministrator()
  {
    $q = $this->_db->query('SELECT name, pass FROM administration');
    $res = $q->fetch(PDO::FETCH_ASSOC);
    
    return $res;
  }

  public function addBook(Book $book)
  {
    $q = $this->_db->prepare('INSERT INTO books(book, name, style, color) VALUES(:book, :name, :style, :color)');
    $q->bindValue(':book', $book->book(), PDO::PARAM_INT);
    $q->bindValue(':name', $book->name(), PDO::PARAM_INT);
    $q->bindValue(':style', $book->style(), PDO::PARAM_INT);
    $q->bindValue(':color', $book->color(), PDO::PARAM_INT);
    $q->execute();
    $this->createTable($book->book());
  }

  public function createTable($book)
  {
    $sql =  'CREATE TABLE '. $book.'(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        img_name VARCHAR(255) NOT NULL,
        is_active VARCHAR(255) NOT NULL
    )';
    $q = $this->_db->prepare($sql);
    $q ->execute();
  }

  public function delFromBooks($id)
  {
    $thebook = $this->getBook($id);
    $this->delBook($thebook); 
    $this->_db->exec('DELETE FROM books WHERE id='.$id);
  }

  public function delBook(Book $book)
  {
    $this->_db->query('DROP TABLE '.$book->book());                
  }

  public function getBooks()
  {
    $books = [];
    $q = $this->_db->query('SELECT id, book, name, style, color FROM books');  
    while($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $books[] = new Book($donnees);
    }
    return $books;
  }

   public function getBook($id)
  {   
    $q = $this->_db->query('SELECT id, book, name, style, color FROM books WHERE id = '.$id);
    $book = $q->fetch(PDO::FETCH_ASSOC);   
    return new Book($book);
  }

  public function getShowcase()
  {
    $q = $this->_db->query('SELECT id, site_name, site_presentation, showcase FROM showcase');
    $showcase = $q->fetch(PDO::FETCH_ASSOC);
    return $showcase;
  }

  public function addShowcase($site, $presentation, $showcase)
  {
    $show = $this->getShowcase();
    $old = getcwd();
    chdir('../../imgShowcase');
    unlink($show['showcase']);
    chdir($old);
    $sql = 'UPDATE showcase SET site_name="'.$site.'", site_presentation="'.$presentation.'", showcase="'.$showcase.'"';
    $q = $this->_db->prepare($sql);
    $q->execute();
  }

  public function getIdBook($table)
  { 
    $q = $this->_db->query('SELECT id FROM books WHERE book="'.$table.'"');
    $idBook = $q->fetch(PDO::FETCH_ASSOC);   
    return $idBook;
  }

  public function moveBook($id, $newId)
  {
    $book1 = $this->getBook($id);
    $book2 = $this->getBook($newId);
    $q1 = $this->_db->query('UPDATE books SET book="'.$book1->book().'", name="'.$book1->name().'", style="'.$book1->style().'", color="'.$book1->color().'" WHERE id='.$newId);   
    $q2 = $this->_db->query('UPDATE books SET book="'.$book2->book().'", name="'.$book2->name().'", style="'.$book2->style().'", color="'.$book2->color().'" WHERE id='.$id);
  }

  public function changeName($newname, $id)
  {
    $sql = 'UPDATE books SET name="'.$newname.'" WHERE id='.$id;
    $q = $this->_db->prepare($sql);
    $q->execute();
  }
}