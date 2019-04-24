<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$courseData=GetCourse($_GET['id']);
	$categorieslist=GetCategories();
?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
			<form id="formeditformation" method="POST" action="/php/validationformation.php?id=<?php echo($courseData['id_article'])?>&action=update&list=0">
				<div class="form-group row">
					<div class="col-md-6">
						<label for="formationname">Nom de la formation: </label><br />
						<label for="formationprice">Prix de la formation: </label><br />
						<label for="formationcategory">Catégorie de la formation: </label><br />
						<label for="formationcontent">Contenu de la formation: </label><br />
						<p id="courseauthor">Auteur de la formation: <?php echo($courseData['pseudo_member'])?></p>
						<p id="coursedate">Date de publication initiale de la formation: <?php echo($courseData['date_article'])?></p>
					</div>
					<div class="col-md-6">
						<input type="text" name="formationname" value="<?php echo(($courseData['name_article']))?>"><br />
						<input type="text" name="formationprice" value="<?php echo(($courseData['price_article']))?>"><br />
						<select name="formationcategory">
							<?php foreach($categorieslist as $category){ ?>
								<option name="<?php echo($category['name_category'])?>"><?php echo($category['name_category'])?></option><br />
							<?php } ?>
						</select><br/>
						<input type="textarea" rows="10" cols="30" name="formationcontent" value="<?php echo(($courseData['description_article']))?>"><br />
					</div>
				</div>
				<input type="submit" value="Sauvegarder" class="button">
			</form>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>