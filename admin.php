<?php
echo 'connexion admin...';

include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/admin/admin.php');
}
