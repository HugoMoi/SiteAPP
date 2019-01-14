<?php session_start(); ?>
<html>
	<head>
		
		<link rel="stylesheet" href="design /General.css" />
		<meta charset="utf-8">


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
						<li class="onglet"><a href=index.php?action=AProposDeNous>A propos de nous </a></li>
						<li class="onglet"><a href=index.php?action=expertise>Expertise </a></li>	
						<li class="onglet"><a href=index.php?action=FAQ>FAQ </a></li>

						<li class="onglet"><a href=index.php?action=contact>Nous contacter</a></li>
						<li class="onglet"><a href=index.php?action=forum>Forum </a></li>
						<li class="onglet"><a href="#">Menu</a>
							<div class="submenu">
								<a href=index.php?action=maison>Maison</a>
								<a href="#">Statistiques</a>
								<a href="index.php?action=profil">Profil</a>
								<a href="#">Paramètres</a>
							</div>
						</li>
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
            <a href="About.php">A propos de nous</a>
            <a href="Expertise.php">Expertise</a>
            <a href=Forum.php>Forum </a>
            <a href="FAQ.php">FAQ</a>

          </div>
        </div>
			</nav>
        </div>
      </li>

		</header>
		
	</body>
</html>