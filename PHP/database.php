<?php
//Connexion à la BDD tutube
try
{
    $tutube = new PDO('mysql:host=localhost;dbname=tutube;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
