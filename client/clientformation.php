<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formation achetee par le client</title>
<!-- faire une page pour les formatons achetees du client -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php require_once('../php/config.php') ?>
	<div class="container">
		<div class="wrapper">
			<h2>Formation</h2>
			<div id="formation_buy">
				<div id="formation_info">
					<form method="post">
						Nom de la formation:</br>
						<input type="text" name="name_formation"><br><!-- insérer php pour le nom de la formation -->
						Professionnel:<br>
						<input type="text" name="name_professional"><br>
						Niveau de la formation: <br>
						<input type="text" name="level_formation"><br>
					</form>
				</div>
				<br>
				<div id="formation_content">
					<h3>Contenu de la formation</h3>
					<!-- php mettre la video de la formation -->
				</div>
				<br>
				<div id="formation_review">
					<!-- faire un formulaire pour donner son avis -->
					<form method="post">
						<input type="text" name="review" value="Donnez votre avis">
						<input type="button" name="submit" value="Soumettre">
					</form>
				</div>

			</div> <!-- div formation_buy -->
		</div> <!-- div wrapper-->
	</div> <!-- div container -->
</body>
<?php require_once('../include/footer.php') ?>
</html>
