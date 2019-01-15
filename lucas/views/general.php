<?php session_start(); ?>
<html>
	<head>
		<title>General</title>
		<link rel="stylesheet" href="design/general.css" />
		<meta charset="utf-8">


	</head>
	<body>
		<header>
				<a href="index.php"><img src="image/Logo.png" alt="logo" id="logo"class="flottant"/></a>
				<?php 
				if (empty($_SESSION['pseudo'])) {?>
					<a class="menu-espaceclient" href=index.php?action=connexion>Connexion</a>
					<a class="menu-inscription" href=index.php?action=inscription>Inscription</a>
					<?php }
				else  {?>
					<a class="menu-espaceclient" href=index.php?action=deconnexion>Déconnexion</a>
					<a class="menu-inscription" href=index.php?action=profil>Bonjour <?php echo $_SESSION['pseudo']?></a>

					 <?php } ?>

				<nav>
					<ul>
						<li class="onglet"><a href=AproposeDNous.html>A propos de nous </a></li>
						<li class="onglet"><a href=Expertise.html>Expertise </a></li>	
						<li class="onglet"><a href=FAQ.php>FAQ </a></li>

						<li class="onglet"><a href=NousContacter.html>Nous contacter</a></li>
						<li class="onglet"><a href=Forum.html>Forum </a></li>
						<li class="onglet"><a href="#">Menu</a>
							<div class="submenu">
								<a href=index.php?action=maison>Maison</a>
								<a href="#">Statistiques</a>
								<a href="Profil.php">Profil</a>
								<a href="#">Paramètres</a>
							</div>
						</li>
					</ul>
				</nav>
		</header>
		
	</body>
</html>