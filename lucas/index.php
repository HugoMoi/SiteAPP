<?php

include ("controllers/controller.php");

if(isset($_GET["action"]) && !empty($_GET['action'])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
        case 'general':
            general();
            break;
        case 'maison':
        	maison();
        	break;
        case 'actionLamp':
        	actionLamp();
        	break;
        case 'actionWindow':
      		actionWindow();
      		break;
        case 'vertical':
            vertical();
            break;
        case 'addRoom':
            addRoom();
            break;
        case 'updateRoom':
            updateRoom();
            break;
    }
} else {
    general();
}

?>