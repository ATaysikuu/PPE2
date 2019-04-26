<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$clientList=GetClients();
	$inactiveClientList=GetInactiveClients();
?>

<!DOCTYPE html>
<html>
<head>
	<title>page admin liste clients</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
			<h2>Liste des clients</h2>
			<div id="listclient_manage" class="row">
			
				<div class="clientlist col-md-6">					
					<table>
							<th colspan="5">Clients actifs</th></tr>
						<tr>
							<td>Pseudo</td>
							<td>Prénom</td>
							<td>Nom</td>
							<td>Désactiver</td>
							<td>Modifier</td>
						<tr>
						<?php
							foreach($clientList as $client){ //for each client in the returned array, print its name in html + button to delete it
						?>
						<tr>
							<td><?php echo ($client['pseudo_member']);?></td>
							<td><?php echo ($client['firstName_member']);?></td>
							<td><?php echo ($client['lastName_member']);?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=deactivate&list=1"><input type="button" name="delete" class="button" value="Désactiver"></a>');?></td>
							<td><?php echo ('<a href="/admin/client.php?uid='.$client["id_member"].'"><input type="button" name="edit" class="button" value="Modifier"></a>');?></td>
						</tr>
						<?php
							}
						?>
					</table>
			</div>
				<div class="clientlist col-md-6">					
					<table>
							<th colspan="5">Clients inactifs</th></tr>
						<tr>
							<td>Pseudo</td>
							<td>Prénom</td>
							<td>Nom</td>
							<td>Activer</td>
							<td>Modifier</td>
							<td>Suppression définitive</td>
						<tr>
						<?php
							foreach($inactiveClientList as $client){ //for each client in the returned array, print its name in html + button to delete it
						?>
						<tr>
							<td><?php echo ($client['pseudo_member']);?></td>
							<td><?php echo ($client['firstName_member']);?></td>
							<td><?php echo ($client['lastName_member']);?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=reactivate&list=1"><input type="button" name="reactivate" class="button" value="Réactiver"></a>');?></td>
							<td><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=delete&list=1"><input type="button" name="delete" class="button" value="Supprimer"></a>');?></td>
							<td><?php echo ('<a href="/admin/client.php?uid='.$client["id_member"].'"><input type="button" name="edit" class="button" value="Modifier"></a>');?></td>
						</tr>
						<?php
							}
						?>
					</table>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>