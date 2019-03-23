<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion professionnel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">
		<div id="formation_list">
			<a href="formationlist.php"><button class="list_button">
				
			</button></a>
		</div>

		<div id="add_formation">
			<a href="addmodify.php"><button class="list_button">
			
			</button></a>
		</div>

		<div id="modify_formation">
			<a href="addmodify.php"><button class="list_button">
			
			</button></a>
		</div>

	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>