<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page formation non achetee</title><!-- identique page formation, donc include formation.php? -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php require_once('../php/config.php') ?>
	<div class="container">
		<div class="wrapper">
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
					<input type="text" name="formation_price" value="">
					<input type="submit" name="buy" value="Acheter">
					
				</div>
		</div>
		</div>

	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>