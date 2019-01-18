<?php include("General.php");
 ?>

<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" href="design/forum.css" />



</head>
<body>

	<h1 align="center">Forum</h1>
	<h2>Choisir une catégorie</h2><br>
<div class="totalCategorie" >

<?php
while($listeCategories=$reqcategories ->fetch()){ 

	$num=$listeCategories['id'];
	$nbmessage=affichNbTopic($num);	/*afficher nb message*/

	?>
	<div id="boite">
		<a class="categorie" href="index.php?action=categorie&var=<?php echo $listeCategories['nom']?>">
			<?php echo $listeCategories['nom'].'<br>'.$nbmessage[0]." topic(s) sur ce sujet"."<br>"?>
		</a>
		<?php 
		if (isset($_SESSION['admin']) && ($_SESSION['admin'])==1) {
			$mID=$num;
			?>
			<a class="delete" href="index.php?action=forum&delete=<?= $mID?>"><i class="material-icons">delete</i></a>
			<?php
		}
		?>
	</div>
<?php
}
if(isset($_SESSION['admin']) AND !empty(($_SESSION['admin']))){
?>
<div id="boite">
<a class="categorie"><form method='POST' action="">
	<input type="ajout" name="ajout">
        <input type="submit"  name='publier' class="publier" value="Publier" />
</form></a>
</div>
<?php } ?>
</div>	




</body>
</html>