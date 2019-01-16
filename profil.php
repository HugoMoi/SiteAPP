<?php include("General.php");

$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
if(isset($_SESSION['id']) AND $_SESSION['id']>0)
{
	$getid = intval($_SESSION['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="design/profil.css" />
	</head>
	<body>
		<div align="center">
			<h2>Profil de <?php echo $userinfo ['pseudo']; ?></h2>
			<br /><br />
			Prenom = <?php echo $userinfo ['prenom']; ?>
			<br />
			Nom = <?php echo $userinfo ['nom']; ?>
			<br />
			Pseudo = <?php echo $userinfo ['pseudo']; ?>
			<br />
			Mail = <?php echo $userinfo ['mail']; ?>
			<br />
			Adresse = <?php echo $userinfo ['adresse']; ?>
			<br />
			Code Postal = <?php echo $userinfo ['codepostal']; ?>
			<br />
			Ville = <?php echo $userinfo ['ville']; ?>
			<br />

		<?php
		if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
		{
			?>
			<a class="lien" href="index.php?action=editionprofil"> Editer mon profil </a>
			<a class="lien" href="index.php?action=deconnexion"> Se déconnecter </a>
			<?php
		}
		?>
		</div>
	</body>
</html>
<?php
}
else{
	header("Location:index.php?action=inscription");
}
?>