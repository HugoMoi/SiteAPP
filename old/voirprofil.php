<?php
session_start();
$titre="Profil";
include("identifiants.php");
include("debuts.php");
include("menu.php");

//On récupère la valeur de nos variables passées par URL
$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
$membre = isset($_GET['m'])?(int) $_GET['m']:'';
?>


<?php
//On regarde la valeur de la variable $action
switch($action)
{
    //Si c'est "consulter"
    case "consulter":
       //On récupère les infos du membre
       $query=$db->prepare('SELECT membre_pseudo, membre_avatar,
       membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
       membre_inscrit, membre_localisation
       FROM forum_membres WHERE membre_id=:membre');
       $query->bindValue(':membre',$membre, PDO::PARAM_INT);
       $query->execute();
       $data=$query->fetch();

       //On affiche les infos sur le membre
       echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> 
       profil de '.stripslashes(htmlspecialchars($data['membre_pseudo']));
       echo'<h1>Profil de '.stripslashes(htmlspecialchars($data['membre_pseudo'])).'</h1>';
       
       echo'<img src="./images/avatars/'.$data['membre_avatar'].'"
       alt="Ce membre n a pas d avatar" />';
       
       echo'<p><strong>Adresse E-Mail : </strong>
       <a href="mailto:'.stripslashes($data['membre_email']).'">
       '.stripslashes(htmlspecialchars($data['membre_email'])).'</a><br />';
       
       echo'<strong>MSN Messenger : </strong>'.stripslashes(htmlspecialchars($data['membre_msn'])).'<br />';
       
       echo'<strong>Site Web : </strong>
       <a href="'.stripslashes($data['membre_siteweb']).'">'.stripslashes(htmlspecialchars($data['membre_siteweb'])).'</a>
       <br /><br />';
 
       echo'Ce membre est inscrit depuis le
       <strong>'.date('d/m/Y',$data['membre_inscrit']).'</strong>
       et a posté <strong>'.$data['membre_post'].'</strong> messages
       <br /><br />';
       echo'<strong>Localisation : </strong>'.stripslashes(htmlspecialchars($data['membre_localisation'])).'
       </p>';
       $query->CloseCursor();
     break;
}
?>

 


</div>
</body>
</html>
