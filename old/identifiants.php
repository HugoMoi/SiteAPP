<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=domisep', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
