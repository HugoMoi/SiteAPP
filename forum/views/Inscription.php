<?php
include("General.php");
?>

<html>
	<head>
		<title>Inscription</title>
	<link rel="stylesheet" href="design/Inscription.css" />
		<meta charset="utf-8">
	</head>
	<body>
				
		<div class="cadre">
			<a href="index.php?action=connexion" style="text-decoration: none;color: black;font-size: 0.7em;"">Déjà inscrit ?</a>
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
							
							<input type="email" placeholder="Confirmez votre adresse mail" id="mail2" name="mail2" value="<?php if (isset($mail2)) {echo $mail2;} ?>"/><a id="erreurMail"></a>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="mdp">Mot de passe </label>
						</td>
						<td>
							<input type="password" placeholder="mot de passe" id="mdp" name="mdp"/>
							<a id="validation"></a>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for ="mdp2">Confirmation du mot de passe </label>
						</td>
						<td>
							<input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2"/>
							<a id="erreur"></a>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="adresse">Adresse</label>
						</td>
						<td>
							<input type="text" name="adresse" placeholder="adresse" required>
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="condition"><a href="https://policies.google.com/terms?hl=fr">Accepter les conditions</a></label>
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

<script>

    document.getElementById("mdp").addEventListener("input", function (verif) 
    {
    	var mdp = verif.target.value;
      	var longueurmdp = "";
     	var color='red';

    	if (mdp.length >= 9) 
      	{
      		var isChiffre = /\d+/;
        	if (isChiffre.test(mdp)) {
                longueurmdp="très fort!!";
                color ='green';
			}
      		else{
        		longueurmdp = " fort";
        		color ='green';
    		}
      	}
      	else if (mdp.length<4){
      		longueurmdp = "faible";
      	}
    	else{
      		longueurmdp="moyen";
      		color ='orange';
      	}
    	var aideMdpElt = document.getElementById("validation");
    	aideMdpElt.textContent = longueurmdp;
    	aideMdpElt.style.color = color; 
    });

/*vérif mdp*/
   document.getElementById("mdp2").addEventListener("input", function(e){
    var mdpVerif= e.target.value;
    var paragrapheErreur = document.getElementById("erreur");
    var color='red';

    if (mdpVerif != document.getElementById("mdp").value) { /*si les mdp sont différents*/
      paragrapheErreur= "\u2717"; /*croix rouge ✗*/
    }
    else{
      color='green';
      paragrapheErreur = "\u2713";/*coche vert ✔*/
    }

    var aide= document.getElementById("erreur");
    aide.textContent = paragrapheErreur;
    aide.style.color = color; 
   });
       
/*vérif mail*/
   document.getElementById("mail2").addEventListener("input", function(e){
    var mailVerif= e.target.value;
    var paragrapheErreur = document.getElementById("erreurMail");
    var color='red';
    if (mailVerif != document.getElementById("mail").value) {
      paragrapheErreur.innerHTML = "\u2717"; /*croix rouge ✗*/
    }
    else{
      color='green';
      paragrapheErreur.innerHTML = "\u2713";/*coche vert ✔*/
      
    }
    var aide= document.getElementById("erreurMail");
    aide.textContent = paragrapheErreur.innerHTML;
    aide.style.color = color; 
   });
      </script>

      <script>
window.onload = function() {
  document.getElementById("pseudo").focus();
};
</script>
