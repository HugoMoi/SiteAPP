<!DOCTYPE html>
<html>
	<head>
		<title>Modification pièce</title>
		<link rel="stylesheet" href="design/general.css">
		<link rel="stylesheet" href="design/updateRoom.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php include("views/general.php"); ?>

		<div id="content">
			<form method="post" action="index.php?action=maison">
        		<p>
            		<label> Nom de la pièce :
                		<input type="text" name="roomName" value="<?= $room['RoomName']; ?>" required>
            		</label>
        		</p>
        		<p>
           			<label> Gestion de la température ?
               			<input type="checkbox" name="roomTemp" <?php if($roomTemp != NULL) {echo 'checked';}?>> 
            		</label>
        		</p>
                <p>Liste des lampes :</p>
                <?php if($lamps->rowCount() == 0) {
                        echo "Il n'y a pas de lampes";
                    }
                    else {
                        while ($lamp= $lamps->fetch()) {
                            $idl = $lamp['LampID'];
                            echo "<p>
                                <label>
                                    <input type='text' name='nameLamp".$idl."' value='".$lamp['LampName']."'>
                                </label>
                            </p>";
                        }
                    } 
                ?>
                <p>Liste des fenêtres :</p>
                <?php if($windows->rowCount() == 0) {
                        echo "Il n'y a pas de capteurs";
                    }
                    else {
                        while ($window= $windows->fetch()) {
                            $idw = $window['WindowID'];
                            echo "<p>
                                    <label>
                                        <input type='text' name='nameWindow".$idw."' value='".$window['WindowName']."'>
                                    </label>
                                </p>";
                        }
                    } 
                ?>
                <p>Liste des capteurs :</p>
                <?php if($captors->rowCount() == 0) {
                        echo "Il n'y a pas de capteurs";
                    }
                    else {
                        while ($captor= $captors->fetch()) {
                            $idc = $captor['CaptorID'];
                            echo "<p>
                                    <label>
                                        <input type text='text' name='nameCaptor".$idc."' value='".$captor['CaptorName']."'>
                                    </label>
                                </p>";
                        }
                    } 
                ?>
        		<p>
        		  <label>
        		      <input type="submit" value="Modifier">
        		  </label>
                </p>
    		</form>
		</div>
	</body>

</html>