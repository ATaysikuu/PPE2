<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion client</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h2>Profil</h2>
			<div class="row">
				<div class="col-md-6 card">

				</div>
				<div class="col-md-6 card">

				</div>

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
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>