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
			<h3>Renseignements sur le client</h3>
			<div id="infos_pro" class="row">
				<!-- recuperer l'id du client -->
					<div class="client">
						<!--  php renseignements pro à voir avec table membres admin=2 + formation achetee en formulaire -->
						<?php 
							$query=$bdd->query('SELECT firstName_member,lastName_member,residence_member,paypal_member,zipcode_member,city_member,mail_member FROM members WHERE id_member="'.$_GET['id_member'].'"'); 
							?> <!-- recuperer les donnees du client avec l'id entrer -->
						<form action="../admin/client.php" method="post">
							<div class="form-group">
								<input type="text" name="firstname" value="<?= htmlentities(($post->firstName_member))?>">
							</div>
						</form>
					</div>
			
			</div>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>