<?php include 'Accueil.php'?>
<?php 
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
$messages = $bdd->query('SELECT * FROM post');?>


<html>
<head>
    <title>FAQ</title>
     <meta charset="utf-8">
    <link rel="stylesheet" href="FAQ.css" />
    <link rel="stylesheet" href="General.css" />

</head>
<body>


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