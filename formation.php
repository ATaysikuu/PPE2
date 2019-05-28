<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(isset($_GET['id'])&&isset($_SESSION['id'])){
		$courseData=GetCourse($_GET['id']);
		$uid=$_SESSION['id'];
		$reviewlist=GetReviewsCourse($_GET['id']);
	}
	else header('Location: /');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo($courseData['name_article'])?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<div class="row">
				<div class="card">
					<div class="row" id="formation_title">
						<h2 class="col-md-12"><?php echo($courseData['name_article'])?></h2><br/>
					</div>
					<div class="row formation_author">
						<h6 class="col-md-12">Auteur: <?php echo($courseData['pseudo_member']);?></h6>
					</div>
					
					<?php
						if(UserRole($uid)!="2" && $courseData['id_seller']!=$uid){
							echo('Veuillez vous connecter avec un compte client pour acheter ou visionner cette formation.');
						}
						else{
							if(UserHasCourse($courseData['id_article'],$uid) || $courseData['id_seller']==$uid){
								?>
									<div class="row">
										<div class="video-container col-md-12">
											<video controls class="bgvid">
												<source src="/videos/<?php echo($_GET['id'])?>.mp4" type="video/mp4">
											</video>
										</div>
									</div>
								<?php
							}
							else {
								?>
									<div id="formation_price" class="row">
										<p class="col-md-12">Prix: <?php echo ($courseData['price_article'])?>€</p>
									</div>
									<div class="row">
										<span class="col-md-12"><button class="button" id="addtobasket" onClick="addtobasket()">Ajouter au panier</button></span>
									</div>
									<div id="operationstatus"></div>
								<?php
							}
						}
					?>
					<div class="row" id="formation_content">
						<h4 class="col-md-12">Contenu de la formation</h4><br/>
					</div>
					<div class="row" id="formation_description">
						<p class="col-md-12"><?php echo($courseData['description_article'])?></p>
					</div>
					<?php 
						if(UserHasCourse($courseData['id_article'],$uid)){
							?>
							<div class="row">
								<div class="col-md-12">
									<form action="/php/review.php?action=submit&courseid=<?php echo($courseData['id_article'])?>" method="POST">
										<textarea rows="5" cols="60" name="fmessage" placeholder="Laissez votre avis sur la formation..."></textarea><br/>
										<input type="submit" value="Soumettre" class="button">
									</form>
								</div>
							</div>
							<?php
						}?>
						
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<?php foreach ($reviewlist as $review) {
									?>
										<h6><?php echo($review['pseudo_member'])?></h6>
										<span><?php echo($review['review'])?></span>
										<hr/>
								<?php
								}?>
							</div>
						</div>
					</div>
					<div class="row" id="formation_date">
						<p class="col-md-12" style="text-align: left !important;">Date de mise en ligne: <?php echo($courseData['date_article'])?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
<script src="/js/jquery331.js"></script>
<script>
function addtobasket() {
	$.ajax({
		type: 'POST',
		url: '/php/basketmanagement.php?courseid=<?php echo $_GET['id']?>&action=addtobasket',
		data: $(),
		success: function() {
			console.log("Successful");
			document.getElementById('operationstatus').innerHTML="Course added to your basket.";
		},
		error: function() {
			console.log("ERROR");
		}
	});
};
</script>
</html>