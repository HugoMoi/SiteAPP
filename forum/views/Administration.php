<?php include 'General.php' ?>
<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
if(isset($_GET['admin']) AND $_GET['admin']==0)
{
	exit();
}
if(isset($_GET['id']) AND $_GET['id']>0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
}
if(isset($_GET['confirme']) AND !empty($_GET['confirme']))
{
	$confirme = (int) $_GET['confirme'];
	$req =  $bdd -> prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
	$req->execute(array($confirme));	
}
if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
	$delete = (int) $_GET['delete'];
	$req =  $bdd -> prepare('DELETE FROM membres  WHERE id = ?');
	$req->execute(array($delete));	
}
$membres = $bdd->query('SELECT * FROM membres');
?>


<html>
	<head>
		<title>Gestion de compte</title>
		<meta charset="utf-8">
	</head>
	<body>
			<h2>Administrateur</h2>
			<ul>

			<?php while($m = $membres->fetch()) { ?>
			<li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if ($m['confirme'] == 0) { ?> - <a href="Administration.php?confirme=<?= $m['id']?>">Confirmer </a> <?php } ?>
			- <a href="Administration.php?delete=<?= $m['id']?>">Supprimer </a></li>
			<?php } ?>


			</ul>
	</body>
</html>