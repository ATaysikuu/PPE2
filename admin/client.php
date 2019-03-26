<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin client</title> <!-- page avec les renseignements du client + formation achetee -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php include '../php/config.php' ?>

	<div class="container">
		<div class="wrapper">
			<div id="infos_pro" class="row">
			<h3>Renseignements sur le client</h3>
				<!-- recuperer l'id du client -->
					<div class="client">
						<!--  php renseignements pro à voir avec table membres admin=2 + formation achetee en formulaire -->
						<?php 
							$query=$bdd->query('SELECT id_member, firstName_member,lastName_member,residence_member,paypal_member,zipcode_member,city_member,mail_member FROM members WHERE id_member="'.$_GET['uid'].'"'); 
							$clientInfo=$query->fetch();
							?> <!-- recuperer les donnees du client avec l'id entrer -->
						<form action="../admin/client.php" method="GET">
							<div class="form-group row">
								<div class="col-md-6">
									<label for="firstname">First Name: </label><br />
									<label for="lastname">Last Name: </label><br />
									<label for="paypal">Paypal Adress: </label><br />
									<label for="mail">Email: </label><br />
									<label for="residence">Address: </label><br />
									<label for="zipcode">Zipcode: </label><br />
									<label for="city">City: </label>
								</div>
								<div class="col-md-6">
									<input type="text" name="firstname" value="<?php echo(($clientInfo['firstName_member']))?>"><br />
									<input type="text" name="lastname" value="<?php echo(($clientInfo['lastName_member']))?>"><br />
									<input type="text" name="paypal" value="<?php echo(($clientInfo['paypal_member']))?>"><br />
									<input type="text" name="mail" value="<?php echo(($clientInfo['mail_member']))?>"><br />
									<input type="text" name="residence" value="<?php echo(($clientInfo['residence_member']))?>"><br />
									<input type="text" name="zipcode" value="<?php echo(($clientInfo['zipcode_member']))?>"><br />
									<input type="text" name="city" value="<?php echo(($clientInfo['city_member']))?>"><br />
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
								<!--TODO-->
									<?php echo ('<a href="/php/usermanagement.php?uid='.$clientInfo["id_member"].'&action=up"><input type="button" name="update" class="button" value="Sauvegarder"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
								</div>
								<div class="col-md-4">
									<?php echo ('<a href="/php/usermanagement.php?uid='.$clientInfo["id_member"].'&action=del"><input type="button" name="delete" class="button" value="Supprimer"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
								</div>
								<!--TODO-->
								<div class="col-md-4">
									<?php echo ('<a href="/php/usermanagement.php?uid='.$clientInfo["id_member"].'&action=res"><input type="button" name="delete" class="button" value="Reset pass"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
								</div>
							</div>
						</form>
					</div>
			
			</div>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>