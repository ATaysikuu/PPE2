<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(!CheckAdmin($_SESSION['pseudo'])){
		header("Location: /");
	}
	$contactList=GetAllContact();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste contacts</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h2>Liste des messages reçus</h2>
			<div id="listclient_manage" class="row">
				<div class="clientlist col-md-12">		
					<div class="card">	
						<hr/>
						<div class="row">
							<h6 class="col-md-4">Prénom</h6>
							<h6 class="col-md-4">Nom</h6>
							<h6 class="col-md-4">Adresse</h6>
						</div>
						<hr/>
						<?php
							foreach($contactList as $contact){ //for each client in the returned array, print its name in html + button to delete it
						?>
                        <div class="card" id="contact_<?php echo($contact['id_contact'])?>">
							<div class="row">
								<span class="col-md-4"><?php echo ($contact['firstname_contact']);?></span>
								<span class="col-md-4"><?php echo ($contact['lastname_contact']);?></span>
								<span class="col-md-4"><?php echo ($contact['email_contact']);?></span>
                            </div>
                            <div class="row">
                                <span class="col-md-12"><p class="card"><?php echo ($contact['message_contact']);?></p></span>
							</div>
                            <div class="row">
                                <?php if($contact['answered']=='0'){
                                    ?>
                                    <span class="col-md-12" id="status_<?php echo($contact['id_contact'])?>"><a href="mailto:<?php echo($contact['email_contact'])?>"><input type="button" class="button" name="answer" value="Répondre" id="answerbutton" onClick="AnswerMessage(<?php echo($contact['id_contact'])?>)"></a> - <input type="button" class="button" name="answer" value="Supprimer" id="deletebutton"onClick="DeleteMessage(<?php echo($contact['id_contact'])?>)"></span>
                                    <?php
                                }else{?>
                                    <span class="col-md-12"><p>Répondu - <input type="button" class="button" name="answer" value="Supprimer" id="deletebutton"onClick="DeleteMessage(<?php echo($contact['id_contact'])?>)"></p></span>
                                    <?php
                                }?>
                                
                            </div>
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
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
<script src="/js/jquery331.js"></script>
<script>
function AnswerMessage($idcontact) {
    $url='/php/contact_action.php?action=answer&messageid='.concat($idcontact);
	$.ajax({
		type: 'POST',
		url: $url,
		data: $(),
		success: function() {
			console.log("Successful");
			document.getElementById('status_'.concat($idcontact)).innerHTML="<p>Répondu</p>";
		},
		error: function() {
			console.log("ERROR");
		}
	});
};
function DeleteMessage($idcontact){
    $url='/php/contact_action.php?action=remove&messageid='.concat($idcontact);
    $.ajax({
		type: 'POST',
		url: $url,
		data: $(),
		success: function() {
			console.log("Successful");
			document.getElementById('contact_'.concat($idcontact)).innerHTML="<p>Message supprimé</p>";
		},
		error: function() {
			console.log("ERROR");
		}
	});
}
</script>
</html>