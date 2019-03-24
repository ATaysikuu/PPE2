<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<div class="container">
		<div id="formation_list">
			<a href="formationlist.php"><button class="list_button">
				<!-- php liste formation -->
				<?php
						require_once("../php/config.php");
						$req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE validation="1"'); //get all waiting courses
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
			</button></a>
		</div>

		<div id="list_client">
			<a href="clientlist.php"><button class="list_button">
				<!-- php liste client -->
				<?php
						require_once("../php/config.php");
						$req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE admin="2"'); //get all clients
					?>
					<table>
						<tr>
							<td>Pseudo</td>
							<td>Prénom</td>
							<td>Nom</td>
							<td>Suppression</td>
						<tr>
						<?php
							while($result=$req->fetch()){ //for each client in the returned array, print its name in html + button to delete it
						?>
						<tr>
							<td><?php echo ($result['pseudo_member']);?></td>
							<td><?php echo ($result['firstName_member']);?></td>
							<td><?php echo ($result['lastName_member']);?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$result["id_member"].'&action=del">SUPPRIMER</a><!-- bouton suppression client -->');?></td>
						</tr>
						<?php
							}
						?>
					</table>
			</button></a>
		</div>

		<div id="list_pro">
			<a href="prolist.php"><button class="list_button">
				<!-- php liste des professionnels -->
				<?php
						require_once("../php/functions.php");
						$req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE admin="0"'); //get all pros
					?>
					<table>
						<tr>
							<td>Pseudo</td>
							<td>Prénom</td>
							<td>Nom</td>
							<td>Suppression</td>
						<tr>
						<?php
							while($result=$req->fetch()){ //for each client in the returned array, print its name in html + button to delete it
						?>
						<tr>
							<td><?php echo ($result['pseudo_member']);?></td>
							<td><?php echo ($result['firstName_member']);?></td>
							<td><?php echo ($result['lastName_member']);?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$result["id_member"].'&action=del">SUPPRIMER</a><!-- bouton suppression client -->');?></td>
						</tr>
						<?php
							}
						?>
					</table>
			</button></a>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>