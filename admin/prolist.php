<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin liste professionnels</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">

		<h3>Liste des professionnels</h3>
		<div id="listpro_manage" class="row">
			
			<div class="prolist col-md-6">
				<button name="modify" class="button"></button><!-- bouton modifier -->
				<button name="delete" class="button"></button><!-- bouton supprimer -->
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP LISTE DES PROFESSIONNELS --->
				</ul>
			</div>
		</div>

	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>