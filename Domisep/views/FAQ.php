<?php include("General.php")?>
<html>
<head>
    <title>FAQ</title>
     <meta charset="utf-8">
    <link rel="stylesheet" href="design/FAQ.css" />
</head>
<body>
<h1>FAQ</h1>
<h2>Les questions les plus fréquentes</h2>
<div class="faq">
<?php 
    while($post = $reqFAQ->fetch()){ 
       ?>

    <section class="question">
        <input type="checkbox" id="<?= $post['ID']?>">
        
        <!-- la question -->
        <label for="<?= $post['ID'] ?>"> 
            <?php echo $post['Question'];?>
        </label>

        <!--la réponse  -->
        <p> <?php echo $post['Reponse'];?>   </p>
    </section>
    <?php } ?>
</div>



<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!coté admin!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<?php 
/*$requser = $bdd-> prepare("SELECT * FROM membres where id = ?");
$requser->*/
if (isset($_SESSION['admin']) && ($_SESSION['admin'])==1) { ?>

<br><br>
<div class="adminpart" align="center">
    <form method='POST' action="" ; >
        <label for="question">Ajouter une question :</label><br>
        <input type="text" name="question" size="80"><br><br>
        <label for="reponse">Réponse :</label><br>
        <textarea name='reponse'rows='4' id="reponse" cols="61"></textarea><br><br>

        <input type="submit"  name='publier' class="publier" value="Publier" />

    </form>
    <?php }
else  {
 } ?>
</div><br><br>

<footer>Si vous n'avez pas trouvé de réponse à votre question vous pouvez regader sur le forum  ou alors nous contacter directement</footer>


</body>
</html>