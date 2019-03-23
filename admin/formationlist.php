<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin liste formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<?php require_once('./include/header.php') ?>
<body>
	<div class="container">
		<h3>Liste des formations</h3>
		<div id="listformation_validation" class="row">
			
			<div class="formationlist col-md-6">
				<button name="validate" class="button"></button> <!-- bouton valider -->
				<button name="refuse" class="button"></button><!-- bouton refuser -->
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP pour valider ou refuser une formation --->
				</ul>
			</div>
	
			<div class="formationlist col-md-6">
				<button name="modify" class="button"></button><!-- bouton modifier une formation -->
				<button name="delete" class="button"></button><!-- bouton supprimer -->
				<button name="checkcontent" class="button"></button><!-- 	bouton voir le contenu -->
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP liste des formations deja valider --->
				</ul>
			</div>
		</div>
	</div>
</body>
<?php require_once('./include/footer.php') ?>
</html>