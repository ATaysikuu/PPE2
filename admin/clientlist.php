<?php session_start() ?>
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
	<?php include '../php/config.php' ?>
	<div class="container">
		<div class="wrapper">
			<h2>Liste des clients</h2>
			<div id="listclient_manage" class="row">
			
				<div class="clientlist col-md-6">
					<a href="../admin/client.php" target="_blank"><input type="button" name="modify" class="button" value="Modifier"></button></a><!-- bouton modifier -->
					<input type="button" name="delete" class="button" value="Supprimer"></button><!-- bouton supprimer -->
					
					<!-- PHP TCHOUUUUUUUUUUUUUUU ICI STP liste des clients admin = 2 --->
					<?php 
						$query = $bdd->query("SELECT firstName_member FROM members WHERE admin=2"); 
						$donnees = $query->fetchAll(); 
						echo'<pre>';
						print_r($donnees);
						echo'<pre>';
					?>
					<ul>
						<?php foreach($donnees as $donnee): ?>
						<li><?= $donnee->lastName_member ?></li>
						<?php endforeach ?>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>