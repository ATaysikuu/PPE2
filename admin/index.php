<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>page connexion admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
<body>

	<div class="container">
		<div class="wrapper">
			<h2>Page connexion Administrateur</h2>
			<span id="formation_list">
				<a href="formationlist.php" target="_blank"><input type="button" class="list_button" value="Formations"> <!-- bouton cliquable qui redirige vers la page liste formations -->
				
				</button></a>
			</span>

			<span id="list_client">
				<a href="clientlist.php" target="_blank"><input type="button" class="list_button" value="Clients"><!-- bouton cliquable qui redirige vers la page liste clients -->
				
				</button></a>
			</span>

			<span id="list_pro">
				<a href="prolist.php" target="_blank"><input type="button" class="list_button" value="Professionnels"><!-- bouton cliquable qui redirige vers la page liste professionnels -->
				
				</button></a>
			</span>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>