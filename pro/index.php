<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion professionnel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
				<h2>Page Professionnel</h2>
				<span id="formation_list">
					<a href="formationlist.php" target="_blank">
						<input type="button" class="list_button" name="listformation" value="Liste des formations">
					</a>
				</span>

				<span id="add_formation">
					<a href="addmodify.php" target="_blank">
						<input type="button" class="list_button" name="addformation" value="Ajouter une formation">
					</a>
				</span>

				<span id="modify_formation">
					<a href="addmodify.php" target="_blank">
						<input type="button" class="list_button" name="modifyformation" value="Modifier la formation">
				
					</a>
				</span>
		</div> <!-- wrapper -->
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>