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