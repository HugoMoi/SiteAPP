<?php
include("General.php");
?>

<html>
	<head>
		<title>Inscription</title>
	<link rel="stylesheet" href="design/Connexion.css" />
		<meta charset="utf-8">
	</head>
	<body>
				
<div class="tabl">
		<div class="cadre">
			<a href="index.php?action=connexion">Déjà inscrit ?</a>
			<h2 align="center">Inscription</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<div class="log2">
				<table>
					
					<tr>
						<td align="right">
							<label for ="pseudo">Pseudo: </label>
						</td>
						<td>
							<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if (isset($pseudo)) {echo $pseudo;} ?>" />
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="prenom">Prénom: </label>
						</td>
						<td>
							<input type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if (isset($prenom)) {echo $prenom;} ?>" />
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="Nom">Nom: </label>
						</td>
						<td>
							<input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if (isset($nom)) {echo $nom;} ?>" />
						</td>
					</tr>


					<tr>
						<td align="right">
							<label for ="mail">Mail: </label>
						</td>
						<td>
							<input type="text" placeholder="Votre mail" id="mail" name="mail" value="<?php if (isset($mail)) {echo $mail;} ?>" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="mail2">Confirmation du mail: </label>
						</td>
						<td>
							<input type="email" placeholder="Confirmez votre adresse mail" id="mail2" name="mail2" value="<?php if (isset($mail2)) {echo $mail2;} ?>"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="mdp">Mot de passe </label>
						</td>
						<td>
							<input type="password" placeholder="mot de passe" id="mdp" name="mdp"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="mdp2">Confirmation du mot de passe </label>
						</td>
						<td>
							<input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2"/>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="adresse">Adresse </label>
						</td>
						<td>
							<input type="text" placeholder="Adresse" id="adresse" name="adresse"/>
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="codepostal">Code Postal </label>
						</td>
						<td>
							<input type="number" placeholder="Code Postal" id="code" name="code"/>
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="ville">Ville </label>
						</td>
						<td>
							<input type="text" placeholder="Ville" id="ville" name="ville"/>
						</td>
					</tr>
						<td align="right">
							<label for="condition">Accepter les conditions</label>
						</td>
						<td>
							<input type="checkbox" name="condition" value="condition" required>
						</td>
					</tr>
			</table></div>
			<br />
			<input type="submit" name="forminscription" value="Je m'inscris" />
		</form>
		<?php
		if(isset(($erreur)))
		{
			echo '<font color = "red">'.$erreur."</font>";
		}
		?>
		</div>
	</div>
	</body>
</html>