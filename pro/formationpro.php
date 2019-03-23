<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formation écrite par le professionnel</title>
<!-- faire une page pour que le professionnel puisse voir le contenu de la formation qu'il a fait -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">
		<h2><!-- insérer php pour le nom de la formation --></h2>
		<div id="formation">
			<div id="formation_info">
				<ul>
					<li><?php ?><!-- nom professionnel php --></li>
					<li><?php ?><!-- date de la formation php --></li>
					<li><?php ?><!-- niveau de la formatio php --></li>
				</ul>
			</div>

			<div id="formation_content">
				<!-- php mettre la video de la formation -->
			</div>
		</div>
	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>
