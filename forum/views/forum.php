<?php include("General.php");
 ?>

<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" href="design/essay.css" />



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

	<a class="categorie" href="index.php?action=categorie&var=<?php echo $listeCategories['nom']?>">
		<?php echo $listeCategories['nom'].'<br>'.$nbmessage[0]." topic(s) sur ce sujet"."<br>"?>
	</a>

<?php
}
?>
</div>	




</body>
</html>
