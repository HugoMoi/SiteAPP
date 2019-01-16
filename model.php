<?php 

include "bdd.php";

/*fonction pour forum.php*/
function affichForum(){
	$bdd=bdd();
	$reqcategories=$bdd -> query('SELECT* FROM categorie ');
	
	return $reqcategories;
}
function affichNbTopic($num){
	$bdd=bdd();
	$reqNbmessage=$bdd ->prepare("SELECT COUNT(titre) FROM topic WHERE id_categorie=?");
	$reqNbmessage->execute(array($num));
	$nbmessage=$reqNbmessage ->fetch();
	return $nbmessage;
}



/*fonction pour categorie.php*/
function affichCategorie($selection){
	$bdd=bdd();
	$request=$bdd-> query("SELECT* FROM topic JOIN categorie ON topic.id_categorie=categorie.id WHERE categorie.nom='$selection'");
	return $request;
}

/*fonctionne aussi dans le topic.php*/
function nbrMessage($num){

	$bdd=bdd();
	/*compter le nbre de message par categorie*/
	$reqNbmessage=$bdd ->prepare("SELECT COUNT(reponse) FROM message WHERE id_topic=?");
	$reqNbmessage->execute(array($num));
	$nbmessage=$reqNbmessage ->fetch();
	return $nbmessage;
}

function addTopic($selection,$titre,$pseudo,$date,$question){
	$bdd=bdd();
	$request2=$bdd-> query("SELECT* FROM categorie WHERE categorie.nom='$selection'");
	$liste=$request2->fetch();
	$idTopic=$liste['id']; /*pour l'id de la catégorie.*/

	$reqPublier = $bdd->prepare('INSERT INTO topic(titre,author,date_topic,id_categorie,Question)  VALUES(?,?,?,"'.$idTopic.'",?)');
    $reqPublier->execute(array($titre,$pseudo,$date,$question));
}



/*partie topic.php*/
function affichQuestion($selection,$numtopic){
	$bdd=bdd();
	$request=$bdd-> query("SELECT* FROM topic JOIN categorie ON topic.id_categorie=categorie.id WHERE categorie.nom='$selection' AND topic.id_topic='$numtopic'");
	return $request;

}

function affichReponse($numtopic){
	$bdd=bdd();
	$reqReponse=$bdd -> query("SELECT * FROM message JOIN topic ON message.id_topic=topic.id_topic WHERE topic.id_topic='$numtopic' ORDER BY message.date_message");
	return $reqReponse;

}
function addPost($id,$reponse,$pseudo,$date){
     $bdd=bdd();
    $reqPublier = $bdd->prepare('INSERT INTO message(reponse,pseudo,id_topic,date_message)  VALUES(?,?,"'.$id.'",?)');
    $reqPublier->execute(array($reponse,$pseudo,$date));
        }

/*Page Expertise*/
function catalogue(){    
     $bdd=bdd();
    $messages = $bdd->prepare('SELECT * FROM catalogue');
    $messages->execute(array());
    return $messages;
    } 

function affichFAQ(){
     $bdd=bdd();
	$reqFAQ = $bdd->query('SELECT * FROM post');
	return $reqFAQ;
}

function addQuestion($question,$reponse){
     $bdd=bdd();
    $reqPublier = $bdd->prepare('INSERT INTO post(Question,Reponse)  VALUES(?,?)');
    $reqPublier->execute(array($question,$reponse));
    return $reqPublier;
    }

/*Lucas*/

function lamps(int $idr) {
	$bdd = bdd();
	$lamps = $bdd->prepare('SELECT * FROM lamp WHERE RoomID=?');
	$lamps->execute(array($idr));
	return $lamps;
}
function windows(int $idr) {
	$bdd = bdd();
	$windows = $bdd->prepare('SELECT * FROM window WHERE RoomID=?');
	$windows->execute(array($idr));
	return $windows;
}
function checkl(int $getidl) {
	$bdd = bdd();
	$checkl = $bdd->prepare('SELECT LampID FROM lamp WHERE LampID = ? AND LampCondition = 1');
    $checkl->execute(array($getidl));
    return $checkl;
}
function offl($getidl) {
	$bdd = bdd();
	$offl = $bdd->prepare('UPDATE lamp SET LampCondition = 0 WHERE LampID  = ?');
    $offl->execute(array($getidl));
    return $offl;
}
function onl(int $getidl) {
	$bdd = bdd();
	$onl = $bdd->prepare('UPDATE lamp SET LampCondition = 1 WHERE LampID = ?');
    $onl->execute(array($getidl));
    return $onl;
}
function checkw(int $getidw) {
	$bdd = bdd();
	$checkw = $bdd->prepare('SELECT WindowID FROM window WHERE WindowID = ? AND WindowCondition = 1');
	$checkw->execute(array($getidw));
	return $checkw; 
}
function offw(int $getidw) {
	$bdd = bdd();
	$offw = $bdd->prepare('UPDATE window SET WindowCondition = 0 WHERE WindowID  = ?');
    $offw->execute(array($getidw));
    return $offw;
}
function onw(int $getidw) {
	$bdd = bdd();
	$onw = $bdd->prepare('UPDATE window SET WindowCondition = 1 WHERE WindowID = ?');
    $onw->execute(array($getidw));
    return $onw;
}
function insertRoom() {
    $bdd = bdd();
    $req = $bdd->prepare("INSERT INTO room (`RoomName`, `RoomTemp`) VALUES (:RoomName,:RoomTemp)");
    $roomTemp = 0;
    if (empty($_POST['roomTemp'])) {
    	$roomTemp = NULL;
    }
    $req->execute(['RoomName' => $_POST['roomName'],'RoomTemp'=>$roomTemp]);
    
    $reqId = $bdd->prepare("SELECT `RoomID` FROM `room` WHERE `RoomName` = :RoomName");
	$reqId->execute(['RoomName' => $_POST['roomName']]);		
	$roomId= $reqId->fetch();
	$nbLamp = $_POST['nbLamp'];
    for ($i=0;$i<$nbLamp;$i++) {
		$reqLamp = $bdd->prepare("INSERT INTO `lamp`(`LampName`, `RoomID`) VALUES (:LampName,:RoomID)");
		$windowName = $_POST['nbLamp'.$i];
		$reqLamp->execute(['LampName'=> $windowName,'RoomID' => $roomId['RoomID']]);
    }
	$nbWindow = $_POST['nbWindow'];
    for ($i=0;$i<$nbWindow;$i++) {
		$reqWindow = $bdd->prepare("INSERT INTO `window`(`WindowName`, `RoomID`) VALUES (:WindowName,:RoomID)");
		$windowName = $_POST['nbWindow'.$i];
		$reqWindow->execute(['WindowName'=> $windowName,'RoomID' => $roomId['RoomID']]);
    }
    $nbCaptor = $_POST['nbCaptor'];
    for ($i=0;$i<$nbCaptor;$i++) {
		$reqCaptor = $bdd->prepare("INSERT INTO `captor`(`CaptorName`, `RoomID`) VALUES (:CaptorName,:RoomID)");
		$CaptorName = $_POST['nbCaptor'.$i];
		$reqCaptor->execute(['CaptorName'=> $CaptorName,'RoomID' => $roomId['RoomID']]);
    } 
}

/*Minh Nam*/

function inscrire($nom, $prenom, $adresse, $code,$ville)
{
	$bdd=bdd();
	$reqnom = $bdd->prepare("SELECT * FROM membres WHERE nom = ?");
    $reqnom->execute(array($nom));

    $reqprenom = $bdd->prepare("SELECT * FROM membres WHERE prenom = ?");
    $reqprenom->execute(array($prenom));

    $reqadresse = $bdd->prepare("SELECT * FROM membres WHERE adresse = ?");
	$reqadresse->execute(array($adresse));

	$reqcode = $bdd->prepare("SELECT * FROM membres WHERE codepostal = ?");
	$reqcode->execute(array($code));

	$reqville = $bdd->prepare("SELECT * FROM membres WHERE ville = ?");
	$reqville->execute(array($ville));
}


function SeConnecter($pseudoconnect,$mdpconnect){
	$bdd=bdd();
	$requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
	$requser->execute(array($pseudoconnect,$mdpconnect));
	return $requser;	
}

function ExistPseudo($pseudo){
    $bdd = bdd();
    $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
	$reqpseudo->execute(array($pseudo));
	$pseudoexist=$reqpseudo->rowCount();
	return $pseudoexist;
}

function ExistMail($mail){
	$bdd = bdd();
	$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
	$reqmail->execute(array($mail));
	$mailexist=$reqmail->rowCount();
	return $mailexist;
}

function AddUser($pseudo,$mail,$mdp,$key,$nom,$prenom,$adresse,$code,$ville){
	$bdd = bdd();
	$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo,mail,motdepasse, confirmkey,nom,prenom,adresse,codepostal,ville) VALUES(?,?,?,?,?,?,?,?,?)");
	$insertmbr->execute(array($pseudo,$mail,$mdp,$key,$nom,$prenom,$adresse,$code,$ville));
}
function AffichEditProfil($VerifId){
	$bdd = bdd();
	$requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   	$requser->execute(array($VerifId));
   	$user = $requser->fetch();
   	return $user;
}

 function EditProfil($VerifId){
 	$bdd = bdd();
    $user= AffichEditProfil($VerifId);
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: index.php?action=profil');
   }
   if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
      $newadresse = htmlspecialchars($_POST['newadresse']);
      $insertadresse = $bdd->prepare("UPDATE membres SET adresse = ? WHERE id = ?");
      $insertadresse->execute(array($newadresse, $_SESSION['id']));
      header('Location: index.php?action=profil');
   }
   if(isset($_POST['newcode']) AND !empty($_POST['newcode']) AND $_POST['newcode'] != $user['codepostal']) {
      $newcode = htmlspecialchars($_POST['newcode']);
      $insertcode = $bdd->prepare("UPDATE membres SET codepostal = ? WHERE id = ?");
      $insertcode->execute(array($newcode, $_SESSION['id']));
      header('Location: index.php?action=profil');
   }
   if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville']) {
      $newville = htmlspecialchars($_POST['newville']);
      $insertville = $bdd->prepare("UPDATE membres SET ville = ? WHERE id = ?");
      $insertville->execute(array($newville, $_SESSION['id']));
      header('Location: index.php?action=profil');
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: index.php?action=profil');
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }


 }

 function Administrationutilisateurs()
 {
 	$bdd = bdd();
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	return $userinfo;

 }


 function Administrationconfirme()
 {
 	$bdd = bdd();
	$confirme = (int) $_GET['confirme'];
	$req =  $bdd -> prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
	$req->execute(array($confirme));
	return $req;	
}

function Administrationdelete()
{
	$bdd = bdd();
	$delete = (int) $_GET['delete'];
	$req =  $bdd -> prepare('DELETE FROM membres  WHERE id = ?');
	$req->execute(array($delete));	
	return $req;

}

?>