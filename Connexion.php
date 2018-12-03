<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=webisep",'root','');


if(isset($_POST['formconnexion']))
{
	$pseudoconnect = htmlspecialchars(($_POST['pseudoconnect']));
	$mdpconnect=sha1($_POST['mdpconnect']);
	if(!empty($pseudoconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
		$requser->execute(array($pseudoconnect,$mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist==1)
		{
			$userinfo = $requser->fetch();
			if($userinfo['confirme']==1)
			{
				
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['mail'] = $userinfo['mail'];
				header("Location: Profil.php?id=".$_SESSION['id']);
			}
			else
			{
				$erreur = "Votre compte n'a pas été confirmé !";
			}
		}
		else
		{
			$erreur= "Votre pseudo et mot de passe ne correspondent pas ";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés";
	}
}

?>
<html>
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" href="General.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php include("General.php"); ?>	

		<div align="center">
			<h2>Connexion</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<input type="text" name="pseudoconnect" placeholder="Pseudo" />
				<input type="password" name="mdpconnect" placeholder="Mot de passe" />
				<input type="submit" name="formconnexion" value="Se connecter" />
			</form>
			<?php
				if(isset(($erreur)))
				{
					echo '<font color = "red">'.$erreur."</font>";
				}
			?>
		</div>
	</body>
</html>