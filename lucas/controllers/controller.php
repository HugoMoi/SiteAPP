<?php 

include "models/model.php";


function maison() {
    include "views/maison.php";
}

function vertical() {
    include "views/vertical.php";
}

function general() {
    include "views/general.php";
}

function actionLamp() {
	if(isset($_GET['idl']) AND !empty($_GET['idl'])) {
    	$getidl = (int) $_GET['idl'];
    	$checkl = checkl($getidl);
    	if($checkl->rowCount() == 1) {
        	offl($getidl);
    	} else {
        	onl($getidl);
    	} 
    include "views/maison.php";
 	} 
}

function actionWindow() {
	if(isset($_GET['idw']) AND !empty($_GET['idw'])) {
    	$getidw = (int) $_GET['idw'];
    	$checkw = checkw($getidw);
    	if($checkw->rowCount() == 1) {
        	offw($getidw);
    	} else {
        	onw($getidw);
    	} 
    include "views/maison.php";
 	} 
}

function addRoom() {
    if (isset($_POST['roomName'])) {
        insertRoom();
        header('Location: index.php?action=maison');
    }
    include "views/addRoom.php";
}

function updateRoom() {
    if(isset($_GET['idr']) AND !empty($_GET['idr'])) {

    }
    include "views/updateRoom.php";
}
/*Forum*/
function forum() {
	$reqcategories= affichForum();
/*	$nbmessage=affichNbTopic($num);
*/    include "views/forum.php";
}
function categorie(){

	$selection =$_GET['var'];
	$request=affichCategorie($selection);
   	if (isset($_POST['publier']))
        {  
       	session_start();
        date_default_timezone_set( 'Europe/Paris' );
        $titre=$_POST['titre'];
    	$question=$_POST['Question'];
   		$pseudo=$_SESSION['pseudo'];
   		$date=date("Y-m-d H:i:s");
		addTopic($selection,$titre,$pseudo,$date,$question);
		$url="index.php?action=categorie&var=".$selection;
		header("Location:".$url);
	}else{
		// nothing to do: pas de nouveau topic
	}

		include "views/categorie.php";
}

function topic(){
	$selection =$_GET['var'];
	$numtopic=$_GET['numtopic'];
	$request=affichQuestion($selection,$numtopic);
	$reqReponse=affichReponse($numtopic);



        if (isset($_POST['publier']))
 		{  
 			session_start();
 			date_default_timezone_set( 'Europe/Paris' );
 			$reponse=$_POST['reponse'];
        	$pseudo=$_SESSION['pseudo'];
        	$date=date("Y-m-d H:i:s");
        	addPost($numtopic,$reponse,$pseudo,$date);

		/*redirection*/
 		$url="index.php?action=topic&var=".$selection."&numtopic=".$numtopic;
		header("Location:".$url);
}
	include"views/topic.php";
}

/*Accueil*/
function accueil(){
	include 'views/Accueil.php';
}

/*Expertise*/
function expertise(){
	$messages=catalogue();
	include 'views/Expertise.php';
}

/*FAQ*/
function FAQ(){
	$reqFAQ=affichFAQ();
	 if (isset($_POST['publier']))
        {
            $question=$_POST['question'];
            $reponse=$_POST['reponse'];
            $reqPublier=addQuestion($question,$reponse);
            header("Location:index.php?action=FAQ");

        }
        else{
        	/*nothing to do : pas de nouvelle question*/
        }
	include 'views/FAQ.php';
}

/*A propos de nous*/
function AProposDeNous(){
	include 'views/About.php';

}

?>
