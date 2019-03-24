<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formation écrite par le professionnel</title>
<!-- faire une page pour que le professionnel puisse voir le contenu de la formation qu'il a fait -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php require_once('../include/header.php') ?>
	<div class="container">
		<div class="wrapper">
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

				<div id="formation_price">
					<!-- php mettre le prix qui sera enregistrer en base de donnée avec validation = 0 parce qu'il faut le valider apres avec la page admin-->
				</div>
			</div><!-- formation -->
		</div> <!-- wrapper -->
	</div><!-- container -->
</body>
<?php require_once('../include/footer.php') ?>
</html>
