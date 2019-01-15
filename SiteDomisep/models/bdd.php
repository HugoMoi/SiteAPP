<?php
function bdd() {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');
		return $bdd;
	}
	catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
	}
}
function connect() {
	$connect = mysqli_connect("localhost", "root", "", "espace_membre");  
	return $connect;
}
?>