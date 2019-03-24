<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin liste formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php include '../php/config.php' ?>
	
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations</h2>
			<div id="listformation_validation" class="row">
			
				<div class="formationlist col-md-6">
					<input type="button" name="validate" class="button" value="Valider"></button> <!-- bouton valider -->
					<input type="button" name="refuse" class="button" value="Refuser"></button><!-- bouton refuser -->
					<ul>
						<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP pour valider ou refuser une formation validation = 0 --->
					</ul>
				</div>
	
				<div class="formationlist col-md-6">
					<input type="button" name="modify" class="button" value="Modifier"></button><!-- bouton modifier une formation -->
					<input type="button" name="delete" class="button" value="Supprimer"></button><!-- bouton supprimer -->
					<input type="button" name="checkcontent" class="button" value="Voir le contenu"></button><!-- 	bouton voir le contenu -->
					<ul>
						<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP liste des formations deja valider validation = 1--->
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>