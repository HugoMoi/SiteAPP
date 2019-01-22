<?php include 'General.php' ?>



<html>
	<head>
		<title>Gestion de compte</title>
		<meta charset="utf-8">
		 <link rel="stylesheet" href="design/ProfilAdmin.css" />
	</head>
	<body>
			<h2>Administrateur</h2>
			<ul>
				<div class="boite">
					<?php while($m = $membres->fetch()) { ?>
					<li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if ($m['confirme'] == 0) { ?> - <a class="confirm" href="index.php?action=administration&confirme=<?= $m['id']?>">Confirmer </a> <?php } ?>
					- <a class="delete" href="index.php?action=administration&delete=<?= $m['id']?>">Supprimer </a></li>
					<?php } ?>
				</div>

			</ul>
	</body>
</html>