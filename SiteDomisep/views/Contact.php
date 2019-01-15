<?php include("General.php"); ?>
<html>
	<head>
		<title>Contact us</title>
		<meta charset="utf-8">
	</head>
	<body>
<div class="tabl">
		<div align="center">
			<h2>Nous contacter</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<table>
					
					<tr>
						<td align="right">
							<label for ="pseudo">Pseudo: </label>
						</td>
						<td>
							<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" />
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="mail">Mail </label>
						</td>
						<td>
							<input type="text" placeholder="Mail" id="mail" name="mail" />
						</td>
					</tr>

					<tr>
						<td align="right">
							<label for ="Message">Message </label>
						</td>
						<td>
							<textarea name="message" placeholder="Votre message" cols="100" rows="10"></textarea>
						</td>
					</tr>


			</table>
			<br />
			<input type="submit" name="sendmail" value="Envoyer" />
		</form>
		</div>
	</div>
	</body>
</html>