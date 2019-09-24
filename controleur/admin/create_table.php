<?php

/*includes*/
include_once('../../modele/connexion_sql.php');

function chargerClasse($classe)
{
  require $classe . '.php'; 
}
chdir('../../modele/admin');   
spl_autoload_register('chargerClasse');

$bookManager = new BookManager($bdd);
$imageManager = new ImageManager($bdd);
$img = htmlspecialchars($_FILES['monfichier']['name']);
$section = htmlspecialchars($_POST['table']);
if($section!=NULL)
{ 	
	if($img!=NULL)
	{	
		$fileExists = $imageManager->checkFile($img);
		if($fileExists != 1)
		{ 			 
			$book = new Book([
				'book' => uniqid(),
				'name' => $section,
				'style' => 'transp',
				'color' => 'light'
			]);     
			/*insert new table in books table*/            						
			$bookManager->addBook($book);				
			/*insert image as background image*/
			$image = new Image([
				'img_name' => $img,
				'is_active' => 'active'
			]);					
			$table = $book->book();
			$imageManager->addImage($image, $table);
			include_once('../../modele/admin/add_img.php');
		}
		else
		{
			header('location:/ajanpoo/admin.php?message="'.$img.'" existe déjà, changer le nom de l\'image <br>(la section n\'a pas été créée.)');
		}
	}
	else
	{
		header('location:/ajanpoo/admin.php?message=Choisissez une image de fond !');
	}           
}
else
{
	header('location:/ajanpoo/admin.php?message=Choisissez un nom pour votre port-folio !');
}
