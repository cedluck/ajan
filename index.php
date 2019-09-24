<?php
// echo 'connexion..';

include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/main/main.php');
}
