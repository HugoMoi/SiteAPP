<?php include("General.php");
?>

<html>
<head>
	<title><?php echo $_GET['var']?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="design/topic.css" />



</head>
<body>
	<div class="enemble">
	<h1>Catégorie '<?php echo $_GET['var']?>'</h1><br>
	<div class="probleme">


<?php 


/*La question*/

$nbmessage=nbrMessage($numtopic);/*pour afficher le nbre de réponse.*/


while ($liste=$request->fetch()) {?>
	<div class="topic">
		<h2><a><?php echo $liste['titre'] ?></a></h2>
		<a>publié le <?php echo $liste['date_topic'] ?></a><br>
		<a class="info">par <span><?php echo $liste['author'] ?></span></a><br>
		<a>Nombre de réponse : <?php echo $nbmessage[0] ?></a>
		<br>
		<p class="question"><?php
		echo $liste['Question'] ?></p><br>
	</div>
</div>


	<!-- les réponses au topic -->
	<div class="totalmessage">
		<?php 
		while ($listeMessage= $reqReponse -> fetch()) {?>
			<div class="message">
				<div class="gauche">
				<a>réponse de : <?php echo $listeMessage['pseudo'] ?><br> le <?php echo $listeMessage['date_message'] ?></a><br></div>
				<div class="droite">
				<a><?php echo $listeMessage['reponse'] ?><br><br></a>
			</div>

			</div>
		<?php 
		}?>
	</div><br><br>

<?php
}

/*repondre aux messages*/
if(empty($_SESSION['id']))
{ ?>
	<br><p>Vous devez être connecter pour pouvoir répondre...</p>

	<?php
} 
else{

?>
<!-- formulaire de réponse -->
<div class="adminpart" align="center">
    <form method='POST' action="" ; >
    	<label>Connecté en tant que <?php echo $_SESSION['pseudo'] ?></label><br><br>

        <label for="reponse">Ajouter une réponse :</label><br>
        <textarea type="text" name="reponse" id="reponse" cols="65" rows="4" required></textarea><br><br>

        <input type="submit"  name='publier' class="publier" value="Publier" />

    </form>
</div><br>
</div>
<?php } ?>
</body>
</html>