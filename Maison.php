<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=webisep;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
	}	
	$inforoom = $bdd->query('SELECT * FROM room');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Maison</title>
		<link rel="stylesheet" href="General.css">
		<link rel="stylesheet" href="Maison.css">
		<meta charset="utf-8">
	</head>
	<body>

		<?php include("General.php"); ?>
		
		<div id="content">
			<?php 
			while ($room = $inforoom->fetch()) 	
			{ 
				$id= $room['RoomID'];
			?>
			<div id="box">
				<input type="checkbox" id="<?php echo $id; ?>">
				<div id="top">
					<div id="pièce"><?php echo $room['RoomName']; ?></div>
					<div id="info">
						<div id="temp"><?php if(isset(($room['RoomTemp']))) { echo $room['RoomTemp'].'°C'; }?></div>
						<div id="light"><img src="#"></div>
						
						<label for="<?php echo $id; ?>"></label>
					</div>
				</div>
				<div id="bot">
					<div id="control">
						<?php 
						$infolamp = $bdd->prepare('SELECT * FROM lamp WHERE RoomID=?');
						$infolamp->execute(array($id));
						while ($lamp = $infolamp->fetch()) 
						{ 
						?>
						<div>
							<p><?php echo $lamp['LampName']; ?></p>
							<label class="switch">
  								<input type="checkbox">
  								<span class="slider round"></span>
  							</label>
  						</div>
  						<?php
						}
						$infolamp->closeCursor();
						$infowindow = $bdd->prepare('SELECT * FROM window WHERE RoomID=?');
						$infowindow->execute(array($id));
						while ($window = $infowindow->fetch()) 
						{ 
						?>
  						<div>
							<p><?php echo $window['WindowName']; ?></p>
							<label class="switch">
  								<input type="checkbox">
  								<span class="slider round"></span>
  							</label>
  						</div>
  						<?php
						}
						$infowindow->closeCursor();
						?>
					</div>
				</div>	
			</div>
			<?php
			}
			$inforoom->closeCursor();
			?>
		</div>
	</body>
</html>