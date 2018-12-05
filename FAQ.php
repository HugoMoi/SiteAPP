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

<?php $compteur=0;
    while($post = $messages->fetch()){ ?>
       <?php $compteur++;?>

    <section class="question">
        <input type="checkbox" id="=<?php echo $compteur; ?>">
        
        <!-- la question -->
        <label for="=<?php echo $compteur; ?>"> 
            <?php 
            $id = $compteur;
            $test = $bdd->prepare('SELECT Question FROM post WHERE id = ?');
            $test -> execute(array($id));
            echo $post['Question']; ?>
        </label>

        <!--la réponse  -->
        <p>  
            <?php $id = $compteur;
            $test = $bdd->prepare('SELECT Reponse FROM post WHERE id = ?');
            $test -> execute(array($id));
            echo $post['Reponse'];
            ?>
        </p>
    </section>
    <?php
    }?>


<footer>Si vous n'avez pas trouvé de réponse à votre question vous pouvez regader sur le forum  ou alors nous contacter directement</footer>
</body>
</html>
