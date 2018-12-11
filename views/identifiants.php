<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
