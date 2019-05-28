<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$pro=GetUser($_GET['uid']);
	$formations=GetAllCoursesPro($_GET['uid']);
?>
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

	<div class="container bodycontent">
		<div class="wrapper">
			<div id="infos_pro" class="row">	
				<div class="col-md-6">	
					<h2>Renseignements sur le professionnel</h2>	
					<div class="card">
					<!-- php renseignements pro à voir avec table membres admin=1 -->
						<form action="/php/usermanagement.php?uid=<?php echo($pro['id_member'])?>&action=up" method="POST" id="formuserinfo">
							<div class="form-group row">
								<div class="col-md-6">
									<label for="pseudo">Pseudo: </label><br />
									<label for="firstname">First Name: </label><br />
									<label for="lastname">Last Name: </label><br />
									<label for="paypal">Paypal Adress: </label><br />
									<label for="mail">Email: </label><br />
									<label for="residence">Address: </label><br />
									<label for="zipcode">Zipcode: </label><br />
									<label for="city">City: </label>
								</div>
								<div class="col-md-6">
									<input type="text" name="pseudo" value="<?php echo(($pro['pseudo_member']))?>"><br />
									<input type="text" name="firstname" value="<?php echo(($pro['firstName_member']))?>"><br />
									<input type="text" name="lastname" value="<?php echo(($pro['lastName_member']))?>"><br />
									<input type="text" name="paypal" value="<?php echo(($pro['paypal_member']))?>"><br />
									<input type="text" name="mail" value="<?php echo(($pro['mail_member']))?>"><br />
									<input type="text" name="residence" value="<?php echo(($pro['residence_member']))?>"><br />
									<input type="text" name="zipcode" value="<?php echo(($pro['zipcode_member']))?>"><br />
									<input type="text" name="city" value="<?php echo(($pro['city_member']))?>"><br />
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
								<!--TODO-->
								<?php //echo ('<input type="submit" name="update" class="button" value="Sauvegarder"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="updateuser" onClick="updateuser">Update</button>
								</div>
								<div class="col-md-4">
									<?php //echo ('<a href="/php/usermanagement.php?uid='.$pro["id_member"].'&action=del"><input type="button" name="delete" class="button" value="Supprimer"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="deleteuser" onClick="deleteuser">Delete</button>
								</div>
								<!--TODO-->
								<div class="col-md-4">
									<?php //echo ('<a href="/php/usermanagement.php?uid='.$pro["id_member"].'&action=res"><input type="button" name="delete" class="button" value="Reset pass"><!-- bouton supprimer --></a><!-- bouton suppression client -->');?>
									<button class="button" id="resetpass" onClick="resetpass">Reset password</button>
								</div>
							</div>
							<div class="row" id="operationstatus">	
							</div>
						</form>
					</div>
				</div>
				<div class="row col-md-6" id="formations_pro">
					<div class="col-md-12">
						<h2>Liste des formations publiées par <?php echo $pro['pseudo_member']?></h2>
						<div class="card">
							<?php
								foreach($formations as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
							?>
							<div class="row">
								<span class="col-md-4"><?php echo ($formation['name_article']);?></span>
								<span class="col-md-4"><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter"></a>');?></span>
								<span class="col-md-4"><?php echo ('<a href="/admin/formation-edit.php?id='.$formation["id_article"].'&action=edit"><input type="button" name="edit" class="button" value="Modifier"></a>');?></span>
							</div>
							<hr/>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
<script src="/js/jquery331.js"></script>
<script>
		$("#updateuser").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/php/usermanagement.php?uid=<?php echo($pro["id_member"])?>&action=update&prolist=0',
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
				url: '/php/usermanagement.php?uid=<?php echo($pro["id_member"])?>&action=deactivate&prolist=0',
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
				url: '/php/usermanagement.php?uid=<?php echo($pro["id_member"])?>&action=resetpass&prolist=0',
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
</html>