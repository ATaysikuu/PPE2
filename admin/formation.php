<?php session_start() ?>
<?php require_once("../php/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php include '../php/config.php' ?>
	<div class="container">
            <div class="wrapper">
		<h3>
			<?php //get course's name
				$reqGetNameFormation=$bdd->query('SELECT name_article FROM articles WHERE id_article="'.$_GET['id'].'"');
				while($res=$reqGetNameFormation->fetch()){
					echo($res['name_article']);
				}
			?>
		</h3>
		<div id="formation_content" class="row">
			<!-- php TCHOU POUR METTRE LE CONTENU DE LA FORMATION  -->
			<?php //get course's content
				$reqGetContentFormation=$bdd->query('SELECT description_article FROM articles WHERE id_article="'.$_GET['id'].'"');
				while($res=$reqGetContentFormation->fetch()){
					echo($res['description_article']);
				}
			?>
		</div>
            </div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>