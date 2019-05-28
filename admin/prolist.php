<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$clientList=GetPros();
	$inactiveClientList=GetInactivePros();
?>

<!DOCTYPE html>
<html>
<head>
	<title>page admin liste pros</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h2 style="text-align:center">Liste des professionnels</h2>
			<div id="listclient_manage" class="row">
				<div class="clientlist col-md-6">		
					<div class="card">
						<div class="row">
							<h4 class="col-md-12">Professionnels actifs</h4>
						</div>
						<hr/>
						<div class="row">
							<h6 class="col-md-4">Pseudo</h6>
							<h6 class="col-md-4">Désactiver</h6>
							<h6 class="col-md-4">Modifier / Détails</h6>
						</div>
						<hr/>
						<?php
							foreach($clientList as $client){ //for each client in the returned array, print its name in html + button to delete it
						?>
						<div class="row">
							<span class="col-md-4"><?php echo ($client['pseudo_member']);?></span>
							<span class="col-md-4"><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=deactivate&prolist=1"><input type="button" name="delete" class="button" value="Désactiver"></a>');?></span>
							<span class="col-md-4"><?php echo ('<a href="/admin/professional.php?uid='.$client["id_member"].'"><input type="button" name="edit" class="button" value="Modifier / Détails"></a>');?></span>
						</div>
						<hr/>
						<?php
							}
						?>
					</div>
			</div>
				<div class="clientlist col-md-6">		
					<div class="card">		
						<div class="row">	
							<h4 class="col-md-12">Professionnels inactifs</h4>
						</div>
						<hr/>
						<div class="row">
							<h6 class="col-md-3">Pseudo</h6>
							<h6 class="col-md-3">Activer</h6>
							<h6 class="col-md-3">Modifier</h6>
							<h6 class="col-md-3">Supprimer</h6>
						</div>
						<hr/>
							<?php
								foreach($inactiveClientList as $client){ //for each client in the returned array, print its name in html + button to delete it
							?>
							<div class="row">
								<h6 class="col-md-3"><?php echo ($client['pseudo_member']);?></h6>
								<h6 class="col-md-3"><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=reactivate&prolist=1"><input type="button" name="reactivate" class="button" value="Activer"></a>');?></h6>
								<h6 class="col-md-3"><?php echo ('<a href="/admin/client.php?uid='.$client["id_member"].'"><input type="button" name="edit" class="button" value="Modifier"></a>');?></h6>
								<h6 class="col-md-3"><?php echo ('<a href="/php/usermanagement.php?uid='.$client["id_member"].'&action=delete&prolist=1"><input type="button" name="delete" class="button" value="Supprimer"></a>');?></h6>
							</div>
							<hr/>
							<?php
								}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>