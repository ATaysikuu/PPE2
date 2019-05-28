<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(isset($_SESSION['id'])){
		$uid=$_SESSION['id'];
		if(!(UserRole($uid)=="0"||UserRole($uid)=="1")){
			header('Location: /');
		}
	}
	else header('Location: /');
	$courses=GetAllCoursesPro($uid);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des formations du professionnel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h2 style="text-align: center">Liste des formations mises en ligne</h2>
			<div class="card">
				<?php
				foreach($courses as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
				?>
					<div class="container formationpropreview">
						<div class="row">
							<span class="col-md-2"><h5>Titre</h5></span>
							<span class="col-md-6"><h5>Description</h5></span>
							<span class="col-md-2"><h5>Mise en ligne</h5></span>
							<span class="col-md-2"><h5>Validation</h5></span>
						</div>
						<hr/>
						<div class="row">
							<span class="col-md-2"><?php echo ($formation['name_article']);?></span>
							<span class="col-md-6"><?php echo ($formation['description_article']);?></span>
							<span class="col-md-2"><?php echo ($formation['date_article']);?></span>
							<span class="col-md-2"><?php if($formation['validation']=="1")echo("Validée");else echo("En attente");?></span>
						</div>
						<div class="row">
							<span class="col-md-12" style="text-align: right !important"><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter"></a>');?></span>
						</div>
					</div>
					<hr/>
				<?php
					}
				?>
		</div>
		</div>
	</div>

</body>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>


<!-- identique à la page formation, rappeler page formation ici -->

