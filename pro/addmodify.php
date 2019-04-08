<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion professionnel</title><!-- page ajouter/modifier du professionnel -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
			<div id="form_formation">
				<form action="/addmodify.php" method=POST>
	  				Nom de la formation:<br>
	  			<input type="text" name="firstname" value="">
	  			<br>
	  				Date de la formation:<br>
	  			<input type="text" name="lastname" value="">
	 			 <br>
	 			 	Professionnel:<br>
	  			<input type="text" name="lastname" value="">
	 			 <br><br>
	 				 Catégorie:<br>
	  			<input type="checkbox" name="lastname" value=""> Développement
	 			 <br>
	 			 <input type="checkbox" name="lastname" value=""> Réseaux
	 			 <br><br><br>
	 			 <!-- PHP HERE POUR METTRE LA CATEGORIE -->
	  			<input type="submit" value="Enregistrer">
				</form> 
			</div>
		</div><!-- wrapper-->
	</div><!-- container -->
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>

