<?php session_start() ?>
<?php include './php/config.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<meta charset="utf-8">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?> <!-- rajout du header -->
<body>
	<?php
		if(isset($_POST['submit']))
		{
			if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['commentaire']))
				{

				}
			else
				{
					$msg="Remplissez tous les champs svp";
				}
		}
		
	?>

	<div class="container">

		<div id="formulaire_contact">
			<h4>Formulaire de contact</h4>
				<form id="formulaire" action="" method=POST>
					<input type="text" id="fid" name="pseudo" placeholder="pseudo">
					<input type="email" id="fmail" name="email" placeholder="email"><br><br>
					<textarea type="text" id="fcomment" name="commentaire" placeholder="commentaire"></textarea> <br><br>
					<input type="submit" id="fsubmit" name="submit" placeholder="Envoyer">
				</form>
				<?php
					if(isset($msg))
					{
						echo $msg;
					}
				?>
		</div>

	<div>

</body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?> <!-- rajout du footer -->
</html>
