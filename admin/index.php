<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>page connexion admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
<body>

	<div class="container bodycontent">
		<div class="wrapper">
			<h2>Page connexion Administrateur</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="card" id="connexion">
					<p>Consultez les formations proposées<br/></p>
					<div class="clear"></div>
					<a href="formationlist.php"><input type="button" name="mesformations" class="button" value="Formations"></a>
					</div>  
					</div>
					<div class="col-md-4">
					<div class="card" id="formations">
						<p>Consultez la liste des clients</p><br/>
						<div class="clear"></div>
						<p><a href="clientlist.php"><input type="button" name="clients" class="button" value="Clients"></a></p>
					</div>
					</div>
					<div class="col-md-4">
					<div class="card" id="contact">
						<p>Consultez la liste des professionnels</p><br/>
						<div class="clear"></div>
						<p><a href="prolist.php"><input type="button" name="pros" class="button" value="Professionnels"></a></p>
					</div>  
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php'); ?>
</html>