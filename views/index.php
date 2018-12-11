<!DOCTYPE html>
<html>
<head>
	<title>FORUM</title>
<link rel="stylesheet" type="text/css" href="../css/header.css">
<link rel="stylesheet" type="text/css" href="../css/design.css">
</head>
<body>
<header>
                <a href="../Home.php"><img src="Logo2.png" alt="logo" id="logo"class="flottant"/></a>
                <a class="menu-espaceclient" href=../Connexion.php>Connexion</a>
                <a class="menu-inscription" href=../Inscription.php>Inscription</a>

                
                

                <nav>
                    <ul>
                        <li class="onglet"><a href="#">A propos de nous </a></li>
                        <li class="onglet"><a href="#">Expertise </a></li>  
                        <li class="onglet"><a href=../FAQ.php>FAQ </a></li>

                        <li class="onglet"><a href="#">Nous contacter</a></li>
                        <li class="onglet"><a href="#">Forum </a></li>
                        <li class="onglet"><a href="#">Menu</a>
                            <div class="submenu">
                                <a href=../Home.php>Accueil</a>
                                <a href=../Connexion.php>Statistiques</a>
                                <a href=../Connexion.php>Espace Client</a>
                                <a href=../Connexion.php>Maison</a>
                                <a href=../Connexion.php>Paramètres</a>
                            </div>
                        </li>
                    </ul>
                </nav>
 </header>
 <br></br>
 <h1>FORUM </h1>
 <br></br>












<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("identifiants.php");
include("debuts.php");


?>















<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>

<?php

//Cette requête permet d'obtenir tout sur le forum
$query=$db->prepare('SELECT cat_id, cat_nom, 
forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id,  forum_topic.topic_post, post_id, post_time, post_createur, membre_pseudo, 
membre_id   FROM forum_categorie
LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
LEFT JOIN forum_membres ON forum_membres.membre_id = forum_post.post_createur
WHERE auth_view <= :lvl 
ORDER BY cat_ordre, forum_ordre DESC');
$query->bindValue(':lvl',$lvl,PDO::PARAM_INT);
$query->execute();
?>


<table>
<?php
//Début de la boucle
while($data = $query->fetch())
{
    //On affiche chaque catégorie
    if( $categorie != $data['cat_id'] )
    {
        //Si c'est une nouvelle catégorie on l'affiche
       
        $categorie = $data['cat_id'];
        ?>
        <tr>
        <th></th>
        <th class="titre">Titre<strong><?php echo stripslashes(htmlspecialchars($data['cat_nom'])); ?>
        </strong></th>             
        <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>       
        <th class="derniermessage"><strong>Dernier message</strong></th>   
        </tr>
        <?php
    }


    //Ici, on met le contenu de chaque catégorie
    ?>



<?php
    // Ce super echo de la mort affiche tous
    // les forums en détail : description, nombre de réponses etc...

    echo'<tr><td><input class="paul" type="submit" name="mess" value="Messages" /></td>
    <td class="titre"><strong>
    <a href="voirforum.php?f='.$data['forum_id'].'">
    '.stripslashes(htmlspecialchars($data['forum_name'])).'</a></strong>
    <br />'.nl2br(stripslashes(htmlspecialchars($data['forum_desc']))).'</td>
    <td class="nombresujets">'.$data['forum_topic'].'</td>
    <td class="nombremessages">'.$data['forum_post'].'</td>';

    // Deux cas possibles :
    // Soit il y a un nouveau message, soit le forum est vide
    if (!empty($data['forum_post']))
    {
         //Selection dernier message
	 $nombreDeMessagesParPage = 15;
         $nbr_post = $data['topic_post'] +1;
	 $page = ceil($nbr_post / $nombreDeMessagesParPage);
		 
         echo'<td class="derniermessage">
         '.date('H\hi \l\e d/M/Y',$data['post_time']).'<br />
         <a href="voirprofil.php?m='.stripslashes(htmlspecialchars($data['membre_id'])).'&amp;action=consulter">'.$data['membre_pseudo'].'  </a>
         <a href="./voirtopic.php?t='.$data['topic_id'].'&amp;page='.$page.'#p_'.$data['post_id'].'">
         <input class="go_button" type="submit" name="go" value="voir le message" /></a></td></tr>';

     }
     else
     {
         echo'<td class="nombremessages">Pas de message</td></tr>';
     }

     //Cette variable stock le nombre de messages, on la met à jour
     $totaldesmessages += $data['forum_post'];

     //On ferme notre boucle et nos balises
} //fin de la boucle
$query->CloseCursor();
echo '</table></div>';
?>

<?php
//Le pied de page ici :
echo'<div id="footer">
<h2>
Qui est en ligne ?
</h2>
';

//On compte les membres
$TotalDesMembres = $db->query('SELECT COUNT(*) FROM forum_membres')->fetchColumn();
$query->CloseCursor();	
$query = $db->query('SELECT membre_pseudo, membre_id FROM forum_membres ORDER BY membre_id DESC LIMIT 0, 1');
$data = $query->fetch();
$derniermembre = stripslashes(htmlspecialchars($data['membre_pseudo']));

echo'<p>Le total des messages du forum est <strong>'.$totaldesmessages.'</strong>.<br />';
echo'Le site et le forum comptent <strong>'.$TotalDesMembres.'</strong> membres.<br />';
echo'Le dernier membre est <a href="./voirprofil.php?m='.$data['membre_id'].'&amp;action=consulter">'.$derniermembre.'</a></p>';
$query->CloseCursor();
?>

<?php
echo'<i>Vous êtes ici : </i><a href ="./index.php">Index du forum</a>';
?>


</div>
</body>
</html>



