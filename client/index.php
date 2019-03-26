<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion client</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once('../include/header.php') ?>
<body>
	<?php require_once('../php/config.php') ?>
	<div class="container">
		<div class="wrapper">
			<h2>Page Client</h2>
			<a href="../client/formation_nobuy.php" target="_blank"><input type="button" name="formation_list_buy" value="Formations non achetées"></a>
					<!-- php mettre la liste des formations achetees par le client -->

			<!-- TROP LONG A FAIRE <div id="formation_category">
					php mettre la liste des categories des formations 
			</div> -->

			<a href="../client/formationlist.php" target="_blank"><input type="button" name="formation_list_buy" value="Formations achetées"></a>
                        <!-- formation achetee -->
		</div>
	</div>
</body>
<?php require_once('../include/footer.php') ?>
</html>