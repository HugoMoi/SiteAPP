<?php

include ("controllers/controller.php");

if(isset($_GET["action"]) && !empty($_GET['action'])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
        case 'forum':
            forum();
            break;
        case 'categorie':
        	categorie();
        	break;
        case 'topic':
            topic();
        break;
        case 'accueil':
            accueil();
            break;
        case 'expertise':
            expertise();
            break;
        case 'FAQ':
            FAQ();
            break;
        case 'AProposDeNous':
            AProposDeNous();
            break;
            /*Lucas*/
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
            /*Minh Nam*/
        case 'inscription':
            inscription();
            break;
        case 'connexion':
            connexion();
            break;
        case 'profil':
            profil();
            break;
        case 'deconnexion':
            deconnexion();
            break;
        case 'editionprofil':
            editionprofil();
            break;
        case 'contact';
            contact();
            break;
        case 'administration':
            administration();
            break;
    }
} else {
    accueil();
}
?>