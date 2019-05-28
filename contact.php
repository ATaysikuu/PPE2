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
	<div class="container bodycontent">
		<div class="wrapper">
			<h2>Nous contacter</h2>
			<div class="card">
				<form id="contactform" method="POST" action="/php/contact_action.php?action=send">
					<div class="col-md-12">
							<input type="text" name="fname" placeholder="prénom"><br /><br />
							<input type="text" name="fsurname" placeholder="nom"><br /><br />
							<input type="text" name="fmail" placeholder="email"><br /><br />
							<textarea rows="10" cols="30" name="fmessage" placeholder="message..."></textarea><br /><br />
							<input type="submit" value="Envoyer" class="button">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?> <!-- rajout du footer -->
</html>
