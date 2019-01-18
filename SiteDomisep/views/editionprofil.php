<?php
include("General.php");


?>
<html>
<div align="center">
   <head>
      <title>edit Profil</title>
      <meta charset="utf-8">
   </head>
   <body>
      
         <h2>Edition de mon profil</h2>
         <div align="center">
            <form method="POST" action="" enctype="multipart/form-data">

               <table>
               
               <tr>
                  <td align="center">
                  <label>Pseudo : <?php echo $_SESSION['pseudo']; ?></label><br /><br />


                  </td>
               </tr>
               <tr>
                  <td align="right">

                  <label>Mail :</label>
                  <input type="text" name="newmail" placeholder="Mail" value="<?php echo $_SESSION['mail']; ?>" /><br /><br />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                  <label>Mot de passe :</label>
                  <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
               </td>
            </tr>
            <tr>
                  <td align="right">
                  <label>Confirmation - mot de passe :</label>
                  <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               </td>
            </tr>
            <tr>
                  <td align="right">
                  <label>Adresse :</label>
                  <input type="text" name="newadresse" placeholder="Adresse"/><br /><br />
                  <input type="text" name="newadresse" placeholder="Adresse" /><br /><br />
               </td>
            </tr>
            <tr>
                  <td align="right">
                  <label>Code Postal :</label>
                  <input type="number" name="newcode" placeholder="Code Postal"/><br /><br />
               </td>
            </tr>
            <tr>
                  <td align="right">
                  <label>Ville :</label>
                  <input type="text" name="newville" placeholder="Ville"/><br /><br />
               </td>
            </tr>
            </table>
            <input type="submit" action="index.php?action=profil" name='publier' class="publier" value="Mettre à jour mon profil !"  />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
