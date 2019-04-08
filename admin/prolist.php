<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<title>page admin liste professionnels</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<?php include '../php/config.php' ?>

	<div class="container">
		<div class="wrapper">
			<h2>Liste des professionnels</h2>
			<div id="listpro_manage" class="row">
			
			<div class="prolist col-md-6">
				<ul>
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP LISTE DES PROFESSIONNELS --->
					<?php
						require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
						$req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE admin="0"'); //get all clients
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
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$result["id_member"].'&action=del"><input type="button" name="delete" class="button" value="Supprimer"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?></td>
							<td><?php echo ('<a href=""><input type="button" name="delete" class="button" value="Modifier"><!-- bouton edition --></a><!-- bouton edition client -->');?></td>
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