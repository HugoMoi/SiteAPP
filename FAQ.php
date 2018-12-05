<?php 
$bdd = new PDO("mysql:host=localhost;dbname=faq",'root','');
$messages = $bdd->query('SELECT * FROM post');?>

<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	 <meta charset="utf-8">
    <link rel="stylesheet" href="../Style/FAQ.css" />
    <link rel="stylesheet" href="../Style/General.css" />

</head>
<body>

<?php include("General.php") ?>


<h1>FAQ</h1>
<h2>Les questions les plus fréquentes</h2>

<section class="question">
    <input type="checkbox" id="Question1">
    <label for="Question1"> <?php 
    	$id = 1;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?>	
    	</label>

    	<p> <?php 
    	$id = 1;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo htmlspecialchars($message['Reponse']);?>
    	
    	</p>
	</section>


<section class="question">
    <input type="checkbox" id="Question2">
    <label for="Question2">
    	<?php
    	$id = 2;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?>
    	</label>

    <p> <?php 
    	$id = 2;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Reponse'];?></p>
</section>


<section class="question">
    <input type="checkbox" id="3">
    <label for="3">
    	<?php
    	$id = 3;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?>
    	</label>

    <p><?php 
    	$id = 3;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Reponse'];?></p>
</section>


<section class="question">
    <input type="checkbox" id="Question4">
    <label for="Question4">
    	<?php
    	$id = 4;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?>
    	</label>

    <p><?php 
    	$id = 4;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Reponse'];?></p>
</section>

<section class="question">
    <input type="checkbox" id="Question5">
    <label for="Question5"><?php
    	$id = 5;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?></label>
    <p><?php 
    	$id = 5;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Reponse'];?></p>
</section>

<section class="question">
    <input type="checkbox" id="Question6">
    <label for="Question6"><?php
    	$id = 6;
    	$test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Question'];?>
    	</label>

    <p><?php 
    	$id = 6;
    	$test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
    	$test -> execute(array($id));
    	$message = $test->fetch();
    	?>
    	<?php echo $message['Reponse'];?></p>
</section>

<footer>Si vous n'avez pas trouvé de réponse à votre question vous pouvez regader sur le forum  ou alors nous contacter directement</footer>
</body>
</html>
