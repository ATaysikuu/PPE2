<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
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
	<?php include '../php/config.php' ?>
	
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations</h2>
			<div id="listformation_validation" class="row">
			
			<div class="formationlist col-md-6">
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP pour valider ou refuser une formation --->
					<?php
						
					?>
					<table>
						<tr>
							<th colspan="4">Formations en attente de validation</th></tr>
						<tr>
							<td>NOM</td>
							<td>DESCRIPTION</td>
							<td>VALIDER</td>
							<td>REFUSER</td>
						<tr>
						<?php
							require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
							$formationlist=GetUnvalidatedCourses();
							foreach($formationlist as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
						?>
						<tr>
							<td><?php echo ($formation['name_article']);?></td>
							<td><?php echo ($formation['description_article']);?></td>
							<td><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=ok"><input type="button" name="ok" class="button" value="Valider"></a> <!-- bouton valider -->');?></td>
							<td><?php echo ('<a href="/php/validationformation.php?id='.$formation["id_article"].'&action=no"><input type="button" name="no" class="button" value="Refuser"></a><!-- bouton refuser -->');?></td>
						</tr>
						<?php
							}
						?>
					</table>
			</div>
				</ul>
			<div class="formationlist col-md-6">
				<ul>
						<table>
							<th colspan="4">Formations validées</th></tr>
							<tr>
								<td>NOM</td>
								<td>MODIFIER</td>
								<td>SUPPRIMER</td>
								<td>CONSULTER</td>
							<tr>
						<?php
							require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
							$formationlistvalidated=GetValidatedCourses();
							foreach($formationlistvalidated as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
							?>
							<tr>
								<td><?php echo ($formation['name_article']);?></td>
								<td><?php echo ('<a href="/admin/formation.php?id='.$formation["id_article"].'&action=edit"><input type="button" name="edit" class="button" value="Modifier"><!-- bouton modifier une formation -->');?></td>
								<td><?php echo ('<a href="/admin/formation.php?id='.$formation["id_article"].'&action=del"><input type="button" name="del" class="button" value="Supprimer"><!-- bouton supprimer -->');?></td>
								<td><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter"><!-- bouton voir le contenu -->');?></td>
							</tr>
							<?php
								}
							?>
						</table>
				</ul>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>