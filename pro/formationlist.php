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
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations du professionnel</h2>
			<table>
				<th colspan="4">Formations mises en ligne</th></tr>
				<tr>
					<td>Titre</td>
					<td>Description</td>
					<td>Date de mise en ligne</td>
					<td>Prix</td>
					<td>Validation</td>
					<td>CONSULTER</td>
				<tr>
				<?php
					foreach($courses as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
				?>
				<tr>
					<td><?php echo ($formation['name_article']);?></td>
					<td><?php echo ($formation['description_article']);?></td>
					<td><?php echo ($formation['date_article']);?></td>
					<td><?php echo ($formation['price_article']);?></td>
					<td><?php if($formation['validation']=="1")echo("Validée");else echo("En attente");?></td>
					<td><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter">');?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>

</body>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>


<!-- identique à la page formation, rappeler page formation ici -->

