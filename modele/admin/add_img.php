<?php
$bookManager = new BookManager($bdd);
// Test if file exist and no errors are passed
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
    // Test file size
    if ($_FILES['monfichier']['size'] <= 1000000)
    {
        $infosfichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = strtolower($infosfichier['extension']);
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

        //check for authorize extension
        if (in_array($extension_upload, $extensions_autorisees))
        {   
            // Occures when using create_table
            if(isset($table))
            {
                move_uploaded_file($_FILES['monfichier']['tmp_name'], '../../img/' . basename($_FILES['monfichier']['name']));  
                $idBook = $bookManager->getIdBook($table);
                header('location:/ajanpoo/admin.php?message=Le port-folio "'.$_POST['table'].'" à été créer !<br/>"'.$_FILES['monfichier']['name'].'" est l\'image de fond de : "'.$_POST['table'].'"#'.$idBook['id']);
            }
            // Occures when downloading showcase image
            else if(isset($showcase))
            {
                move_uploaded_file($_FILES['monfichier']['tmp_name'], '../../imgShowcase/' . basename($_FILES['monfichier']['name']));
                header('location:/ajanpoo/admin.php?message="Page d\'accueil créée."');
            }
            else
            {
                 move_uploaded_file($_FILES['monfichier']['tmp_name'], '../../img/' . basename($_FILES['monfichier']['name']));
            }           
        }
        else
        {
            header('location:/ajanpoo/admin.php?message="'.$_FILES['monfichier']['name'].'" n\'a pas la bonne extension ! (jpg, jpeg, gif, png)');
        }       
    }
    else
    {
        header('location:/ajanpoo/admin.php?message="'.$_FILES['monfichier']['name'].'" est trop gros ! (1000 ko maximum)');
    }
}
else
{
    header('location:/ajanpoo/admin.php?message=Il y à eut une erreur !');
}