<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>page admin liste clients</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<div class="container">
		<h3>Liste des clients</h3>
		<div id="listclient_manage" class="row">
			
			<div class="clientlist col-md-6">
				<button name="modify" class="button"></button><!-- bouton modifier -->
				<button name="delete" class="button"></button><!-- bouton supprimer -->
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP liste des clients admin = 2 --->
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
				</ul>
			</div>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php'); ?>
</html>