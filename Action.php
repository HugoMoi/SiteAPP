<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

if(isset($_GET['id']) AND $_GET['id']>0)
    {
        $getid = intval($_GET['id']);
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    }


if(isset($_GET['idw']) AND !empty($_GET['idw'])) {
   $getidw = (int) $_GET['idw'];
   $checkw = $bdd->prepare('SELECT WindowID FROM window WHERE WindowID = ? AND WindowCondition = 1');
   $checkw->execute(array($getidw));
   if($checkw->rowCount() == 1) {
        $offw = $bdd->prepare('UPDATE window SET WindowCondition = 0 WHERE WindowID  = ?');
        $offw->execute(array($getidw));
    } else {
        $onw = $bdd->prepare('UPDATE window SET WindowCondition = 1 WHERE WindowID = ?');
        $onw->execute(array($getidw));
    } 
    header("Location: Maison.php?id=".$_SESSION['id']);
}
if(isset($_GET['idl']) AND !empty($_GET['idl'])) {
    $getidl = (int) $_GET['idl'];
    $checkl = $bdd->prepare('SELECT LampID FROM lamp WHERE LampID = ? AND LampCondition = 1');
    $checkl->execute(array($getidl));
    if($checkl->rowCount() == 1) {
         $offl = $bdd->prepare('UPDATE lamp SET LampCondition = 0 WHERE LampID  = ?');
         $offl->execute(array($getidl));
     } else {
         $onl = $bdd->prepare('UPDATE lamp SET LampCondition = 1 WHERE LampID = ?');
         $onl->execute(array($getidl));
     } 
     header("Location: Maison.php?id=".$_SESSION['id']);
 } 
else {
    header("Location: Homec.php?id=".$_SESSION['id']);
}
