<?php

$bdd = new PDO("mysql:host=localhost;dbname=webisep",'root','');

if(isset($_POST['forminscription']))
{
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
	

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))

	{
		$reqnom = $bdd->prepare("SELECT * FROM membres WHERE nom = ?");
		$reqnom->execute(array($nom));

		$reqprenom = $bdd->prepare("SELECT * FROM membres WHERE prenom = ?");
		$reqprenom->execute(array($prenom));

		$reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
		$reqpseudo->execute(array($pseudo));
		$pseudoexist=$reqpseudo->rowCount();
		if($pseudoexist==0)
		{
			$pseudolength = strlen($pseudo);
			if($pseudolength<=255)
			{
				if ($mail == $mail2)
				{
					if(filter_var($mail, FILTER_VALIDATE_EMAIL))
					{
						$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
						$reqmail->execute(array($mail));
						$mailexist=$reqmail->rowCount();
						if($mailexist==0)
						{
							if ($mdp==$mdp2)
							{

								$longueurKey = 15;
								$key = "";
								for($i=1;$i<$longueurKey;$i++)
								{
									$key .= mt_rand(0,9);
								}
								$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo,mail,motdepasse, confirmkey,nom,prenom) VALUES(?,?,?,?,?,?)");
								$insertmbr->execute(array($pseudo,$mail,$mdp,$key,$nom,$prenom));


								$header="MIME-Version: 1.0\r\n";
								$header.='From:"WebISep"<minhnamnguyenisep@gmail.com>'."\n";
								$header.='Content-Type:text/html; charset="uft-8"'."\n";
								$header.='Content-Transfer-Encoding: 8bit';

								$message='
								<html>
									<body>
										<div align="center">
											<a href="http://localhost/app/Confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmer votre compte</a>
										</div>
									</body>
								</html>
								';

								mail($mail, "Confirmation de compte", $message, $header);
								$erreur = "Votre compte a bien été crée <a href=\"Connexion.php\">Me connecter</a>" ;
							}
							else
							{
								$erreur = "Vos mots de passe ne correspondent pas";
							}
						}
						else
						{
							$erreur = "Adresse mail déjà utilisée";
						}
					}
					else
					{
						$erreur = "Votre adresse mail n'est pas valide";
					}
					
				}
				else
				{
					$erreur = "Vos adresses mails ne correspondent pas";
				}

			}
			else
			{
				$erreur = "Votre pseudo ne doit pas dépasser 255 caractères";
			}

		}
		else
		{
			$erreur = "Votre pseudo a déjà été utilisé";
		}
	
	}
	else
	{
		$erreur= "Tous les champs doivent être complétés";
	}
}

?>
<html>
	<head>
		<title>Inscription</title>
		<link rel="stylesheet" href="Menu.css" />
		<meta charset="utf-8">
	</head>
	<body>
		
		<?php include("General.php"); ?>

		<div class="tabl">
			<div align="center">
				<h2>Inscription</h2>
				<br /><br /><br />
				<form method="POST" action="">
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
								<input type="email" placeholder="Confirmez adresse mail" id="mail2" name="mail2" value="<?php if (isset($mail2)) {echo $mail2;} ?>"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for ="mdp">Mot de passe </label>
							</td>
							<td>
								<input type="password" placeholder="Mot de passe" id="mdp" name="mdp"/>
							</td>
						</tr>
						<tr>
							<td align="right">
								<label for ="mdp2">Confirmation du mot de passe </label>
							</td>
							<td>
								<input type="password" placeholder="Confirmez mot de passe" id="mdp2" name="mdp2"/>
							</td>
						</tr>
					</table>
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