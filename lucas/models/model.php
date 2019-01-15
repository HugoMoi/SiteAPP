<?php 

include "models/bdd.php";

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

function captors(int $idr) {
    $bdd = bdd();
    $captors = $bdd->prepare('SELECT * FROM captor WHERE RoomID=?');
    $captors->execute(array($idr));
    return $captors;
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

function insertRoom($roomTemp) {
    $bdd = bdd();
    $req = $bdd->prepare("INSERT INTO room (`RoomName`, `RoomTemp`) VALUES (:RoomName,:RoomTemp)");
    $req->execute(['RoomName' => $_POST['roomName'],'RoomTemp'=>$roomTemp]);
    
    $reqId = $bdd->prepare("SELECT `RoomID` FROM `room` WHERE `RoomName` = :RoomName");
	$reqId->execute(['RoomName' => $_POST['roomName']]);		
	$roomId= $reqId->fetch();

	$nbLamp = $_POST['nbLamp'];
    for ($i=0;$i<$nbLamp;$i++) {
		$reqLamp = $bdd->prepare("INSERT INTO `lamp`(`LampName`, `RoomID`) VALUES (:LampName,:RoomID)");
		$reqLamp->execute(['LampName'=> $_POST['nbLamp'.$i],'RoomID' => $roomId['RoomID']]);
    }
	$nbWindow = $_POST['nbWindow'];
    for ($i=0;$i<$nbWindow;$i++) {
		$reqWindow = $bdd->prepare("INSERT INTO `window`(`WindowName`, `RoomID`) VALUES (:WindowName,:RoomID)");
		$reqWindow->execute(['WindowName'=> $_POST['nbWindow'.$i],'RoomID' => $roomId['RoomID']]);
    }
    $nbCaptor = $_POST['nbCaptor'];
    for ($i=0;$i<$nbCaptor;$i++) {
		$reqCaptor = $bdd->prepare("INSERT INTO `captor`(`CaptorName`, `RoomID`) VALUES (:CaptorName,:RoomID)");
		$reqCaptor->execute(['CaptorName'=> $_POST['nbCaptor'.$i],'RoomID' => $roomId['RoomID']]);
    } 
}

function rooms(int $idr) {
	$bdd = bdd();
	$rooms = $bdd->prepare("SELECT * FROM room WHERE RoomID = ? ");
	$rooms->execute(array($idr));
	return $rooms;		
}

function room_update($id,$text) {
    $connect = connect();
    $sql = "UPDATE room SET RoomName ='$text' WHERE RoomID ='$id'";  
    if(mysqli_query($connect, $sql))  {  
      echo 'Data Updated';  
    }    
}

function room_delete() {
    $connect = connect();
    $sql = "DELETE FROM room WHERE RoomID = '".$_POST["id"]."'";  
    mysqli_query($connect, $sql);
}

function room_insert() {
    $connect = connect();
    $sql = "INSERT INTO room(RoomID,RoomName) VALUES(".$_GET['idr'].",'".$_POST["room_name"]."')";  
    mysqli_query($connect, $sql);
}

function temp_edit($id,$temp) {
    $connect = connect();
    $sql = "UPDATE room SET RoomTempState ='$temp' WHERE RoomID ='$id'";  
    if(mysqli_query($connect, $sql))  {  
      echo 'Data Updated';  
    } 
}

function room_select() {
    $connect = connect(); 
    $sql = "SELECT * FROM room WHERE RoomID =".$_GET['idr'];  
    $result = mysqli_query($connect, $sql);
    return $result;
}

function lamp_update($id,$text) {
	$connect = connect();
	$sql = "UPDATE lamp SET LampName ='".$text."' WHERE LampID ='".$id."'";  
 	if(mysqli_query($connect, $sql))  {  
      echo 'Data Updated';  
 	}    
}

function lamp_delete() {
	$connect = connect();
    $sql = "DELETE FROM lamp WHERE LampID = '".$_POST["id"]."'";  
    mysqli_query($connect, $sql);
}

function lamp_insert() {
	$connect = connect();
    $sql = "INSERT INTO lamp(LampName,RoomID) VALUES('".$_POST["lamp_name"]."',".$_GET['idr'].")";  
    mysqli_query($connect, $sql); 
}

function lamp_select() {
	$connect = connect(); 
	$sql = "SELECT * FROM lamp WHERE RoomID =".$_GET['idr']." ORDER BY LampName ASC";  
 	$result = mysqli_query($connect, $sql);
 	return $result;
}

function window_update($id,$text) {
	$connect = connect();
	$sql = "UPDATE window SET WindowName ='$text' WHERE WindowID ='$id'";  
 	if(mysqli_query($connect, $sql))  {  
      echo 'Data Updated';  
 	}    	  
}

function window_delete() {
	$connect = connect();
    $sql = "DELETE FROM window WHERE WindowID = '".$_POST["id"]."'";  
    mysqli_query($connect, $sql);  
}

function window_insert() {
	$connect = connect();
    $sql = "INSERT INTO window(WindowName,RoomID) VALUES('".$_POST["window_name"]."',".$_GET['idr'].")";  
    mysqli_query($connect, $sql);  
}

function window_select() {
	$connect = connect(); 
	$sql = "SELECT * FROM window WHERE RoomID =".$_GET['idr']." ORDER BY WindowName ASC";  
 	$result = mysqli_query($connect, $sql);
 	return $result;
}

function captor_update($id,$text) {
	$connect = connect();
	$sql = "UPDATE captor SET CaptorName ='$text' WHERE CaptorID ='$id'";  
 	if(mysqli_query($connect, $sql))  {  
      echo 'Data Updated';  
 	}   
}

function captor_delete() {
	$connect = connect();
    $sql = "DELETE FROM captor WHERE CaptorID = '".$_POST["id"]."'";  
    mysqli_query($connect, $sql);
}

function captor_insert() {
	$connect = connect();
    $sql = "INSERT INTO captor(CaptorName,RoomID) VALUES('".$_POST["captor_name"]."',".$_GET['idr'].")";  
    mysqli_query($connect, $sql);
}

function captor_select() {
	$connect = connect(); 
	$sql = "SELECT * FROM captor WHERE RoomID =".$_GET['idr']." ORDER BY CaptorName ASC";  
 	$result = mysqli_query($connect, $sql);
 	return $result;
}

function temp_update($temp) {
	$connect = connect();
	$sql = "UPDATE room SET RoomTemp ='$temp' WHERE RoomID =".$_GET['idr'];
	mysqli_query($connect, $sql);
}


?>

