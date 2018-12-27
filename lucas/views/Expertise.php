<?php 
include("General.php")



    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Expertise</title>
	<link rel="stylesheet" href="design/Expertise.css" />

		<meta charset="utf-8">
</head>
<body>

	<div class="fond">	
			<h1>Expertise</h1>

		<p class="description">Sécurisep est un projet qui vise à démocratiser la maison connecter dans le monde. Nous voulons faciliter la vie de nos clients grâce à nos fonctionnalitées présentees sur notre site. Ce projet à commencer en septembre 2018 et à vu le jour grâce à Domisep, une enreprise </p>
</div>
	<h2>Catalogue</h2>
	
<div class="catalogue">

<?php   $compteur=0;
    while($catalogue = $messages->fetch()){ 
       $compteur++;?>

    <section class="capteur">
        
        <div class="bandeau">

        <h3> 
           <?php
           echo $catalogue['nom'];?>
        </h3>

        <p class="float">
        <img class="image" src="image/<?php echo $catalogue['image'] ?>" alt="capteur" id="capteur"/></p>

        <p class="text">
        <span>Description</span> :<br>   
           <?php catalogue($compteur);
           	echo $catalogue['description']; ?><br><br>
        <?php echo 'Prix : ' . $catalogue['prix'].' €' ?><br>
        <?php echo 'Poids : ' .$catalogue['poids'].' g' ?>
        </p>

    </div>
    </section>
    <?php
    }?>
</div>

</body>
</html>