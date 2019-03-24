<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin liste professionnels</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<div class="container">

		<h3>Liste des professionnels</h3>
		<div id="listpro_manage" class="row">
			
			<div class="prolist col-md-6">
				<button name="modify" class="button"></button><!-- bouton modifier -->
				<button name="delete" class="button"></button><!-- bouton supprimer -->
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP LISTE DES PROFESSIONNELS --->
					<?php
						require_once("../php/config.php");
						$req=$bdd->query('SELECT pseudo_member, firstName_member, lastName_member FROM members WHERE admin="0"'); //get all clients
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
							<td><?php echo ('<button name="delete_user" class="button"></button><!-- bouton suppression client -->');?></td>
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