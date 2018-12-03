<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');


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
			if($userinfo['confirme']==1 AND $userinfo['admin']==0)
			{
				
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['mail'] = $userinfo['mail'];
				header("Location: profil.php?id=".$_SESSION['id']);
			}
			elseif ($userinfo['confirme']==1 AND $userinfo['admin']==1)
			{
				header("Location: Administration.php");
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
		<link rel="stylesheet" href="Menu.css" />
		<meta charset="utf-8">
	</head>
	<body>
		<header>
				<a href="Menu_v2.html"><img src="Logo2.png" alt="logo" id="logo"class="flottant"/></a>
				<a class="menu-espaceclient" href=connexion.php>Connexion</a>
				<a class="menu-inscription" href=inscription.php>Inscription</a>

				<div class="menu">
					<a class="menu-expertise" href="#">Expertise </a>
					<a class="menu-AproposDeNous" href="#">A propos de nous </a>
					<a class="menu-FAQ" href="#">FAQ </a>		
					<a class="menu-Forum" href="#">Forum</a>
					<a class="menu-NousContacter" href="#">Nous contacter </a>
				</div>

		</header>
		<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">Profil</a>
  <a href="#">Maison</a>
  <a href="#">Statistiques</a>
  <a href="#">Paramètres</a>
  <a href="#">Aide</a>
</div>

<button class="openbtn" onclick="openNav()">☰ Menu</button>  

<script>
function openNav() {
    document.getElementById("mySidepanel").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}
</script>
		<div align="center">
			<h2>Connexion</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<input type="text" name="pseudoconnect" placeholder="pseudo" />
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