    <?php include("views/General.php");?>
<html>
<head>
  <link rel="stylesheet" href="design/parametre.css" />
    <meta charset="utf-8" />
<title>paramètres</title> 
</head>
<body>
   
<?php if (isset($_SESSION['id'])) {?>
<form method="post" action="traitement.php">
 
   <fieldset>
       <legend>Ajouter un enfant ou un invité</legend> 

       <label for="nom">Quel est son nom</label>
       <input type="text" name="nom" id="nom" />

       <label for="prenom">Quel est son prénom ?</label>
       <input type="text" name="prenom" id="prenom" />
 
       <label for="email">Quel est son e-mail ?</label>
       <input type="email" name="email" id="email" />

   </fieldset>
 
   <fieldset>
       <legend>Notifications</legend>
 
       <p>
           Vous voulez recevoir vos notifications par :

           <input type="radio" name="notifications" value="sms" id="sms" /> <label for="sms">sms</label>
           <input type="radio" name="notifications" value="email" id="email" /> <label for="email">e-mail</label>
           <input type="radio" name="notifications" value="les deux" id="les deux" /> <label for="les deux">sms et e-mail</label>
           <input type="radio" name="notifications" value="aucune" id="aucune" /> <label for="aucune">Ne recevoir <strong> aucunes </strong>   notifications</label>
       </p>
   </fieldset>

<fieldset>
  <legend>Langues</legend>
     <p>
       <label for="langue">Choix de la <strong>langue</strong></label><br />
       <select name="langue" id="langue">
           <option value="français">français</option>
           <option value="espagnol">español</option>
           <option value="italien">italiano</option>
           <option value="anglais">english</option>
           <option value="chinois">中国</option>
       </select>
   </p>
</fieldset>
</form>
<?php } 
else{
    header('Location:index.php?action=connexion');
}
  ?>
</body>
</html>