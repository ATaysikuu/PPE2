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
	<div class="container">
		<h3>Liste des formations</h3>
		<div id="listformation_validation" class="row">
			
			<div class="formationlist col-md-6">
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP pour valider ou refuser une formation --->
					<?php
						require_once("../php/config.php");
						$req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE validation="0"'); //get all waiting courses
					?>
					<table>
						<tr>
							<td>NOM</td>
							<td>DESCRIPTION</td>
							<td>VALIDER</td>
							<td>REFUSER</td>
						<tr>
						<?php
							while($result=$req->fetch()){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
						?>
						<tr>
							<td><?php echo ($result['name_article']);?></td>
							<td><?php echo ($result['description_article']);?></td>
							<td><?php echo ('<a href="/php/validationformation.php?id='.$result["id_article"].'&action=ok">VALIDER</a> <!-- bouton valider -->');?></td>
							<td><?php echo ('<a href="/php/validationformation.php?id='.$result["id_article"].'&action=no">REFUSER</a><!-- bouton refuser -->');?></td>
						</tr>
						<?php
							}
						?>
					</table>
				</ul>
			</div>
	
			<div class="formationlist col-md-6">
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP liste des formations deja valider --->
					<?php
						require_once("../php/config.php");
						$req=$bdd->query('SELECT name_article, description_article FROM articles WHERE validation="1"'); //get all courses
						?>
						<table>
							<tr>
								<td>NOM</td>
								<td>DESCRIPTION</td>
								<td>MODIFIER</td>
								<td>SUPPRIMER</td>
								<td>CONSULTER</td>
							<tr>
							<?php
								while($result=$req->fetch()){ //for each category in the returned array, print its name in html + buttons to edit, delete or consult course
							?>
							<tr>
								<td><?php echo ($result['name_article']);?></td>
								<td><?php echo ($result['description_article']);?></td>
								<td><?php echo ('<button name="modify" class="button"></button><!-- bouton modifier une formation -->');?></td>
								<td><?php echo ('<button name="delete" class="button"></button><!-- bouton supprimer -->');?></td>
								<td><?php echo ('<button name="checkcontent" class="button"></button><!-- bouton voir le contenu -->');?></td>
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
<?php require_once('../include/footer.php') ?>
</html>