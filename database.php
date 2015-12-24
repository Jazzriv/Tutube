<?php

//Connexion à la BDD movies

{
    $videos = new PDO('mysql:host=localhost;dbname=../databases/movies-v2;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//Connexion à la BDD users
try
{
    $users = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
