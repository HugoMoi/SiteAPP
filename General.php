<?php

$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');

if(isset($_GET['id']) AND $_GET['id']>0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	$_SESSION['id'] = $userinfo['id'];	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>General</title>
		<link rel="stylesheet" href="General.css" />
		<meta charset="utf-8">


	</head>
	<body>
		<header>
				<a href=Homec.php?id=<?php echo $_SESSION['id'];?>><img src="Logo2.png" alt="logo" id="logo"class="flottant"/></a>
				<a class="menu-inscription" href="deconnexion.php">Deconnexion</a>
				<label class="menu-espaceclient">Bonjour Monsieur <?php  echo $userinfo['nom'] ;?> </label> 
				

				<nav>
					<ul>
						<?php
								if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
								{
									?>
										<li class ="onglet"><a href=about.php?id=<?php echo $_SESSION['id'];?>>A propos de nous</a></li>
						<li class="onglet"><a href="Expertise.php?id=<?php echo $_SESSION['id'];?>">Expertise </a></li>	
						<li class="onglet"><a href=FAQ.php?id=<?php echo $_SESSION['id'];?>>FAQ</a></li>
						<li class="onglet"><a href="#">Nous contacter</a></li>
						<li class="onglet"><a href="views/index.php">Forum </a></li>
						<li class="onglet"><a href="#">Menu</a>
							<div class="submenu">
								<a href=Homec.php?id=<?php echo $_SESSION['id'];?>>Accueil</a>
								<a href="#">Statistiques</a>
								<a href=Profil.php?id=<?php echo $_SESSION['id'];?>>Espace Client</a>
								<a href=maison.php?id=<?php echo $_SESSION['id'];?>>Maison</a>
								<a href=Parametres.php?id=<?php echo $_SESSION['id'];?>>Paramètres</a>
									<?php
								}
								?>
						
							</div>
						</li>
					</ul>
				</nav>
		</header>
		
	</body>
</html>

<?php   
}
else {
   header("Location: Home.php");
}
?>