<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">
		<div id="formation_list">
			<a href="formationlist.php"><button class="list_button">
				<!-- php liste formation -->
			</button></a>
		</div>

		<div id="list_client">
			<a href="clientlist.php"><button class="list_button">
				<!-- php liste client -->
			</button></a>
		</div>

		<div id="list_pro">
			<a href="prolist.php"><button class="list_button">
				<!-- php liste des professionnels -->
			</button></a>
		</div>
	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>