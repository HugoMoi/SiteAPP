<?php
include("General.php");
?>
<html>
	<head>
		<title>Connexion</title>
	<link rel="stylesheet" href="design/Connexion.css" />
		<meta charset="utf-8">
	</head>
	<body>
		
		<div class="cadre" >
			<h2 align="center">Connexion</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<div class="log">
				<input type="text" name="pseudoconnect" placeholder="pseudo" />
				<input type="password" name="mdpconnect" placeholder="Mot de passe" />
				</div>
				<br><br>
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