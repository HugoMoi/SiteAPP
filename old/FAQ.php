<?php 
$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
$messages = $bdd->query('SELECT * FROM post');

    function faq($compteur){    
        $bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
        $messages = $bdd->prepare('SELECT * FROM post WHERE id = ?');
        $messages->execute(array($compteur));
        $post = $messages->fetch();
    } 

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>FAQ</title>
     <meta charset="utf-8">
    <link rel="stylesheet" href="../Style/FAQ.css" />

</head>
<body>

<?php include("General.php") ?>


<h1>FAQ</h1>
<h2>Les questions les plus fréquentes</h2>
<div class="faq">
<?php $compteur=0;
    while($post = $messages->fetch()){ 
       $compteur++;?>

    <section class="question">
        <input type="checkbox" id="=<?php echo $compteur; ?>">
        
        <!-- la question -->
        <label for="=<?php echo $compteur; ?>"> 
           <?php faq($compteur); 
                   echo $post['Question'];
?>
        </label>

        <!--la réponse  -->
        <p>  
            <?php faq($compteur); 
                    echo $post['Reponse'];
?>

        </p>
    </section>
    <?php
    }?>
</div>

<footer>Si vous n'avez pas trouvé de réponse à votre question vous pouvez regader sur le forum  ou alors nous contacter directement</footer>
</body>
</html>
