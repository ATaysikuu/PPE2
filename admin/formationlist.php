<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$formationlist=GetUnvalidatedCourses();
	$formationlistvalidated=GetValidatedCourses();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page admin liste formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h2 style="text-align:center">Liste des formations</h2>
			<div id="listformation_validation" class="row">
			
			<div class="formationlist col-md-6">
				<div class="card">
					<h5 style="text-align:center">Formations en attente de validation</h5>
					<hr/>
					<div class="row">
						<h6 class="col-md-3">Nom</h6>
						<h6 class="col-md-3">Consulter</h6>
						<h6 class="col-md-3">Valider</h6>
						<h6 class="col-md-3">Refuser</h6>
					</div>
					<hr/>
					<?php
						foreach($formationlist as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
					?>
					<div class="row">
						<span class="col-md-3"><?php echo ($formation['name_article']);?></span>
						<span class="col-md-3"><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'&action=ok"><input type="button" name="ok" class="button" value="Consulter"></a>');?></span>
						<span class="col-md-3"><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=ok"><input type="button" name="ok" class="button" value="Valider"></a>');?></span>
						<span class="col-md-3"><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=no"><input type="button" name="no" class="button" value="Refuser"></a>');?></span>
					</div>
					<hr/>
					<?php
						}
					?>
				</div>
			</div>
			<div class="formationlist col-md-6">
				<div class="card">
					<h5 style="text-align:center">Formations en attente de validation</h5>
					<hr/>
					<div class="row">
						<h6 class="col-md-3">Nom</h6>
						<h6 class="col-md-3">Modifier</h6>
						<h6 class="col-md-3">Dépublier</h6>
						<h6 class="col-md-3">Supprimer</h6>
					</div>
					<hr/>
					<?php
						foreach($formationlistvalidated as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
					?>
					<div class="row">
						<span class="col-md-3"><?php echo ('<a href="/formation.php?id='.$formation['id_article'].'">'.$formation['name_article'].'</a>');?></span>
						<span class="col-md-3"><?php echo ('<a href="/admin/formation-edit.php?id='.$formation["id_article"].'&action=edit"><input type="button" name="edit" class="button" value="Modifier"></a>');?></span>
						<span class="col-md-3"><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=unvalidate"><input type="button" name="del" class="button" value="Dépublier"></a>');?></span>
						<span class="col-md-3"><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=delete"><input type="button" name="del" class="button" value="Supprimer"></a>');?></span>
					</div>
					<hr/>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>