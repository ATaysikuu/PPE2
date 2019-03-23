<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page formation non achetee</title><!-- identique page formation -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">
		<div id="formation_nobuy">

			<div id="formation_info"> <!-- informations de la formation, professionnel, date, niveau de la formation -->
				<ul>
					<li><?php ?><!-- nom professionnel php --></li>
					<li><?php ?><!-- date de la formation php --></li>
					<li><?php ?><!-- niveau de la formatio php --></li>
				</ul>
			</div>
			<div id="formation_description">
				<!-- php mettre la description de la formation -->
			</div>
			<div id="formation_price">
				<!-- php mettre le prix de la formation -->
				<button name="acheter" value="Acheter">
				</button>
			</div>
		</div>

	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>