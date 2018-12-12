<?php 
$bdd = bdd();
$rooms = $bdd->query('SELECT * FROM room'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Maison</title>
		<link rel="stylesheet" href="design/general.css">
		<link rel="stylesheet" href="design/maison.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>

		<?php include("views/general.php"); ?>
		
		<div id="content">
			<?php while ($room = $rooms->fetch()) { 
				$idr= $room['RoomID'];
			?>

			<div id="box">
				<input type="checkbox" id="<?php echo $idr; ?>">
				<div id="top">
					<div id="pièce"><?php echo $room['RoomName']; ?></div>
					<div id="info">
						<div id="temp"><?php if(isset(($room['RoomTemp']))) { echo $room['RoomTemp'].'°C'; } ?></div>
						<div id="light"></div>
						
						<label for="<?php echo $idr; ?>"></label>
					</div>
				</div>
				<div id="bot">
					<div id="control">

						<?php $lamps = lamps($idr);
						while ($lamp= $lamps->fetch()) {
							$idl = $lamp['LampID'];
							$statel = $lamp['LampCondition'];
						?>

						<div>
							<p><?php echo $lamp['LampName']; ?></p>
							<label class="switch">
								<a href="index.php?action=actionLamp&idl=<?= $idl ?>">
									<input type="checkbox" name="switch" value="1"
										<?php if($statel == true) {echo 'checked';}?> >
									  <span class="slider lamp"></span>
								</a>
  							</label>
  						</div>

  						<?php }
						$windows = windows($idr);
						while ($window = $windows->fetch()) { 
							$idw = $window['WindowID'];
							$statew = $window['WindowCondition'];
						?>

  						<div>
							<p><?php echo $window['WindowName']; ?></p>
							<label class="switch">
								<a href="index.php?action=actionWindow&idw=<?= $idw ?>">
									<input type="checkbox" name="switch" value="1"
										<?php if($statew == true) {echo 'checked';}?> >
									<span class="slider window"></span>
								</a>
  							</label>
  						</div>

  						<?php } ?>

					</div>
				</div>	
			</div>
			<?php } ?>
		</div>
	</body>
</html>