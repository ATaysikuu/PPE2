<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des formations du client</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/php/config.php') ?>
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations achetées</h2>
			<!-- liste des formations achetees par le client en php -->
                        <div id="formation_client">
                            <ul>
                                <br><!--Afficher les formations achetées par le client -->
                                <?php
                                 
                                       $reqGetNameFormation=$bdd->query('SELECT name_article FROM articles WHERE articles.id_article=(SELECT soldarticles.id_article FROM soldarticles WHERE id_buyer="'.$_GET['id'].'")'); 
                                       while($res=$reqGetNameFormation->fetch()){
                                           echo($res['name_article']);
                                       }
                                 ?>
                               
                            </ul>
                              
                        </div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>

<!-- php rappeler page formation -->

