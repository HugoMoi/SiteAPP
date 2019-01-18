<?php include("General.php");
?>

<html>
<head>
	<title><?php echo $_GET['var']?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="design/categorie.css" />


</head>
<body>
	<h1>Catégorie '<?php echo $_GET['var']?>'</h1><br><br>
<div class="ensemble">
<?php

/*afficher les topic*/
while ($liste=$request->fetch()) {

	$num=$liste['id_topic'];
	$nbmessage=nbrMessage($num);	/*pour afficher le nbre de message*/	
	?>

	<div class="topic">
	<h2 class="titre"><a class="clicable" href="index.php?action=topic&var=<?php echo $selection?>&numtopic=<?php echo $liste['id_topic']?>"><?php echo $liste['titre'] ?></a></h2>
	<div class="corp">
	<a class="info">publié le <?php echo $liste['date_topic'] ?></a><br>
	<a class="info">par <span><?php echo $liste['author'] ?></span></a><br>
	<a class="info">Nombre de réponse : <?php echo $nbmessage[0] ?></a>
	<br>
	<p class="text"><?php
	echo $liste['Question'] ?></p><br>
	</div>
<?php
$mID=$liste['id_topic'];
    if (isset($_SESSION['admin']) && ($_SESSION['admin'])==1) {
    	$url="index.php?action=categorie&var=".$selection."&delete=<?= $mID?>";?>
    	<a class="delete" href="index.php?action=categorie&var=<?= $selection ?>&delete=<?= $mID?>">
Supprimer </a>
<?php
} ?>
	</div><br>
<?php
}   

?>

<!-- ajouter un topic -->
<?php 
if(empty($_SESSION['id']))
{
	?>
	<br><p>Vous devez être connecter pour pouvoir poser un question...</p>
	<?php
} 
else{
?>
<br><br><div class="adminpart" align="center">
	<h2>Vous avez une question ? Posez la à la communauté!!</h2>
    <form method='POST' action="" ; >
    	<label>Connecté en tant que <?php echo $_SESSION['pseudo'] ?></label><br><br>

        <label for="titre">Ajouter un titre à votre topic :</label><br>
        <input type="text" name="titre" id="titre" size="80" required><br><br>

		<label for="Question">Ajouter votre message :</label><br>
        <textarea type="text" name="Question" id="Question" cols="62" rows="4" required></textarea><br><br>



        <input type="submit"  name='publier' class="publier" value="Publier" />

    </form>
</div><br>
</div>
    <?php } ?>

</body>
</html>