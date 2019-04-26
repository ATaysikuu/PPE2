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
	<div class="container">
		<div class="wrapper">
			<h2>Page Client</h2>
			<!-- appel de la fonction GetUser pour afficher les informations du client -->


			<a href="../formationlist.php" target="_blank"><input type="button" name="formation_list_buy" value="Formations non achetées"></a>
				<!-- liste des formations -->
					
			<a href="../client/formationsclient.php" target="_blank"><input type="button" name="formation_list_buy" value="Formations achetées"></a>
                        <!-- formation achetee -->
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>