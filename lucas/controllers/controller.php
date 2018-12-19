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

?>