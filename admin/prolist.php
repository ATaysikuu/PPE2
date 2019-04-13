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
					<table>
						<tr>
							<td>Pseudo</td>
							<td>Prénom</td>
							<td>Nom</td>
							<td>Suppression</td>
						<tr>
						<?php
							require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
							$prosList=GetPros();
							foreach($prosList as $pro){ //for each pro in the returned array, print its name in html + button to delete it
						?>
						<tr>
							<td><?php echo ($pro['pseudo_member']);?></td>
							<td><?php echo ($pro['firstName_member']);?></td>
							<td><?php echo ($pro['lastName_member']);?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$pro["id_member"].'&action=del"><input type="button" name="delete" class="button" value="Supprimer"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?></td>
							<td><?php echo ('<a href="/admin/client.php?uid='.$pro["id_member"].'"><input type="button" name="edit" class="button" value="Modifier"><!-- bouton edition --></a><!-- bouton edition client -->');?></td>
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