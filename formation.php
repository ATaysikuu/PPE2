<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	$courseData=GetCourse($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo($courseData['name_article'])?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
			<div id="formation_title" class="row">
				<h2><?php echo($courseData['name_article'])?></h2>
				<h5>Auteur: <?php echo($courseData['pseudo_member']);?>
			</div>
			<div id="formation_content" class="row">
				<!-- php TCHOU POUR METTRE LE CONTENU DE LA FORMATION  -->
				<h4>Contenu de la formation</h4><br/>
				<p><?php echo($courseData['description_article'])?></p>
			</div>
			<div id="formation_date" class="row">
				<p>Date de mise en ligne: <?php echo($courseData['date_article'])?></p>
			</div>
			<div id="formation_price" class="row">
				<p>Prix: <?php echo($courseData['price_article'])?></p>
		</div>
            </div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>