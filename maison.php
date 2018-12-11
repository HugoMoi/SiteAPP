<?php include("General.php"); ?>
<?php
	try {
		session_start();
		$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

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
		<link rel="stylesheet" href="Maison1.css">
		<meta charset="utf-8">
	</head>
	<body>
		
		<div id="content">
			<?php 
			while ($room = $inforoom->fetch()) 	
			{ 
				$idr= $room['RoomID'];
			?>
			<div id="box">
				<input type="checkbox" id="<?php echo $idr; ?>">
				<div id="top">
					<div id="pièce"><?php echo $room['RoomName']; ?></div>
					<div id="info">
						<div id="temp"><?php if(isset(($room['RoomTemp']))) { echo $room['RoomTemp'].'°C'; }?></div>
						<div id="light"><img src="#"></div>
						
						<label for="<?php echo $idr; ?>"></label>
					</div>
				</div>
				<div id="bot">
					<div id="control">
						<?php 
						$infolamp = $bdd->prepare('SELECT * FROM lamp WHERE RoomID=?');
						$infolamp->execute(array($idr));
						while ($lamp = $infolamp->fetch()) 
						{ 
							$idl = $lamp['LampID'];
							$statel = $lamp['LampCondition'];
						?>
						<div>
							<p><?php echo $lamp['LampName']; ?></p>
							<label class="switch">
								<a href="Action.php?id=<?=$userinfo['id']?>&idl=<?= $idl ?>">
									<input type="checkbox" name="switch" value="1"
										<?php if($statel == true) {echo 'checked';}?> >
									  <span class="slider lamp"></span>
								</a>
  							</label>
  						</div>
  						<?php
						}
						$infolamp->closeCursor();
						$infowindow = $bdd->prepare('SELECT * FROM window WHERE RoomID=?');
						$infowindow->execute(array($idr));
						while ($window = $infowindow->fetch()) 
						{ 
							$idw = $window['WindowID'];
							$statew = $window['WindowCondition'];
						?>
  						<div>
							<p><?php echo $window['WindowName']; ?></p>
							<label class="switch">
								<a href="Action.php?id=<?=$userinfo['id']?>&idw=<?= $idw ?>">
									<input type="checkbox" name="switch" value="1"
										<?php if($statew == true) {echo 'checked';}?> >
									<span class="slider window"></span>
								</a>
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