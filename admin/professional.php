<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin professionnel</title> <!-- page avec les renseignements du professionel+formations faite -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<?php include '../php/config.php' ?>

	<div class="container">
		<div class="wrapper">
			<h3>Renseignements sur le professionnel</h3>
			<div id="infos_pro" class="row">
			
				<div class="pro">
					<!-- php renseignements pro à voir avec table membres admin=0 -->
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>