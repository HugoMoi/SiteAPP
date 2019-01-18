<?php session_start(); ?>
<html>
	<head>
		
		<link rel="stylesheet" href="design /General.css" />
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >

	</head>
	<body class="body_header">
		<header>
			<a href="index.php?action=accueil"><img class="logo" src="image/Logo2.png" alt="logo" id="logo"class="flottant"/></a>
			<?php 
			if (empty($_SESSION['pseudo'])) {?>
				<a class="menu-espaceclient" href=index.php?action=connexion>Connexion</a>
				<a class="menu-inscription" href=index.php?action=inscription>Inscription</a>
				<?php }
			else  {?>
				<a class="menu-espaceclient" href=index.php?action=deconnexion>Déconnexion</a>
				<a class="menu-inscription" href=index.php?action=profil>Bonjour <?php echo $_SESSION['pseudo']?></a>

			<?php } ?>

			<nav class="barre_navigation">
				<ul>
					<li class="onglet"><a href="index.php?action=AProposDeNous">A propos</a></li>
					<li class="onglet"><a href="index.php?action=expertise">Expertise </a></li>	
					<li class="onglet"><a href="index.php?action=FAQ">FAQ </a></li>

					<li class="onglet"><a href="index.php?action=contact">Contact</a></li>
					<li class="onglet"><a href="index.php?action=forum">Forum </a></li>
					
					<?php if (!empty($_SESSION['pseudo'])) { 
						$idm = intval($_SESSION['id']);
						$fav = fav($idm); 
						foreach($fav as $row) {
							$idh = $row['fav']; ?>

					<li class="onglet"><a href="#"><i class="material-icons">menu</i></a>
						<div class="submenu">
							<a href="index.php?action=maison&idh=<?= $idh ?>">Maison</a>
							<a href="index.php?action=statistique">Statistiques</a>
							<a href="index.php?action=profil">Profil</a>
							<a href="index.php?action=parametre">Paramètres</a>
						</div>
					</li>
						<?php } } ?>
				</ul>

				<li class="menu_fantome"><a href="#">Menu</a>
			        <div class="sousMenu_fantome">
				        <div class="column">
				            <a href="Accueil.php">Accueil</a>
				            <a href="#">Statistiques</a>
				            <a href="#">Profil</a>
				            <a href="#">Paramètres</a>
				        </div>
				        <div class="column">
				            <a href="index.php?action=AProposDeNous">A propos</a>
				            <a href="index.php?action=expertise">Expertise</a>
				            <a href="index.php?action=forum">Forum </a>
				            <a href="index.php?action=FAQ">FAQ</a>
				        </div>
			        </div>
			   	</li>
			</nav>
		</header>
		
	</body>
</html>