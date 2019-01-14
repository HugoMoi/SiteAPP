<?php include 'General.php' ?>



<html>
	<head>
		<title>Gestion de compte</title>
		<meta charset="utf-8">
	</head>
	<body>
			<h2>Administrateur</h2>
			<ul>

			<?php while($m = $membres->fetch()) { ?>
			<li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if ($m['confirme'] == 0) { ?> - <a href="index.php?action=administration&confirme=<?= $m['id']?>">Confirmer </a> <?php } ?>
			- <a href="index.php?action=administration&delete=<?= $m['id']?>">Supprimer </a></li>
			<?php } ?>


			</ul>
	</body>
</html>