<?php 
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$clientInfo=GetUser($_GET['uid']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>page admin client</title> <!-- page avec les renseignements du client + formation achetee -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php'); ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			
			<h2>Renseignements sur le client</h2>
			<div id="infos_client" class="row">
				<!-- recuperer l'id du client -->
				<div class="col-md-12">
					<form action="/php/usermanagement.php?uid=<?php echo($clientInfo['id_member'])?>&action=up" method="POST" id="formuserinfo">
						<div class="form-group card">
							<div class="row col-md-6">
								<div class="col-md-6">
									<label for="pseudo">Pseudo: </label><br />
									<label for="firstname">First Name: </label><br />
									<label for="lastname">Last Name: </label><br />
									<label for="paypal">Paypal Adress: </label><br />
									<label for="mail">Email: </label><br />
									<label for="residence">Address: </label><br />
									<label for="zipcode">Zipcode: </label><br />
									<label for="city">City: </label><br />
								</div>
								<div class="col-md-6">
									<input type="text" name="pseudo" value="<?php echo(($clientInfo['pseudo_member']))?>"><br />
									<input type="text" name="firstname" value="<?php echo(($clientInfo['firstName_member']))?>"><br />
									<input type="text" name="lastname" value="<?php echo(($clientInfo['lastName_member']))?>"><br />
									<input type="text" name="paypal" value="<?php echo(($clientInfo['paypal_member']))?>"><br />
									<input type="text" name="mail" value="<?php echo(($clientInfo['mail_member']))?>"><br />
									<input type="text" name="residence" value="<?php echo(($clientInfo['residence_member']))?>"><br />
									<input type="text" name="zipcode" value="<?php echo(($clientInfo['zipcode_member']))?>"><br />
									<input type="text" name="city" value="<?php echo(($clientInfo['city_member']))?>"><br />
							</div>
							<div class="row col-md-12">
								<div class="col-md-4">
								<!--TODO-->
									<?php //echo ('<input type="submit" name="update" class="button" value="Sauvegarder"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="updateuser" onClick="updateuser">Update</button>
								</div>
								<div class="col-md-4">
									<?php //echo ('<a href="/php/usermanagement.php?uid='.$clientInfo["id_member"].'&action=del"><input type="button" name="delete" class="button" value="Supprimer"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="deleteuser" onClick="deleteuser">Delete</button>
								</div>
								<!--TODO-->
								<div class="col-md-4">
									<?php //echo ('<a href="/php/usermanagement.php?uid='.$clientInfo["id_member"].'&action=res"><input type="button" name="delete" class="button" value="Reset pass"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="resetpass" onClick="resetpass">Reset password</button>
								</div>
							</div>
							<div class="row col-md-12">
								<div id="operationstatus"></div>
							</div>

						</div>
						</div>
						
					</form>
				</div>
			
			</div>
		</div>
	</div>
</body>
<script src="/js/jquery331.js"></script>
<script>
		$("#updateuser").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/php/usermanagement.php?uid=<?php echo($clientInfo["id_member"])?>&action=update&list=0',
				data: $(formuserinfo).serialize(),
				success: function() {
					console.log("Successful");
					document.getElementById('operationstatus').innerHTML="User info successfully updated.";
				},
				error: function() {
					console.log("ERROR");
				}
			});
		});
		$("#deleteuser").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/php/usermanagement.php?uid=<?php echo($clientInfo["id_member"])?>&action=deactivate&list=0',
				data: $(),
				success: function() {
					console.log("user deactivated");
					document.getElementById('operationstatus').innerHTML="User successfully deactivated.";
				},
				error: function() {
					console.log("Signup was unsuccessful");
				}
			});
		});
		$("#resetpass").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/php/usermanagement.php?uid=<?php echo($clientInfo["id_member"])?>&action=resetpass&list=0',
				data: $(),
				success: function() {
					console.log("user password updated");
					document.getElementById('operationstatus').innerHTML="User password successfully reset.";
				},
				error: function() {
					console.log("error");
				}
			});
		});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>