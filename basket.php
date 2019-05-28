<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
	$basketContent=GetBasket($_SESSION['id']);
	$total=null;?>

<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<meta charset="utf-8">
</head>
<header>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?> <!-- rajout du header -->
</header>
	<body>
	<div class="container bodycontent">
		<div class="wrapper">
			<h4 style="text-align:center;">Mon panier</h4>
			<div class="row card" id="basket">
				<div class="row col-md-12">
					<h5 class="col-md-2">Nom</h5>
					<h5 class="col-md-7">Description</h5>
					<h5 class="col-md-3">Prix</h5>
				</div>
				<hr/>
				<?php
					foreach($basketContent as $element){
				?>
				<div class="row">
					<h6 class="col-md-2"><?php echo ($element['name_article']);?></h6>
					<p class="col-md-7"><?php echo ($element['description_article']);?></p>
					<p class="col-md-1"><?php echo ($element['price_article']."€");?></p>
					<p class="col-md-2"><a href="/php/basketmanagement.php?action=remove&courseid=<?php echo($element['id_article']);?>"><input class="button"type="button"value="Supprimer"></a></p>
				</div>
				<hr/>
				<?php
					$total+=$element['price_article'];
					}
				?>
				<div class="row col-md-12">
					<p class="col-md-12">Prix Total: <?php echo ($total."€");?></p><br/>
				</div>
				<div class="row">
					<p class="col-md-6"><a href="/php/basketmanagement.php?action=empty"><input type="button" class="button" value="Vider le panier"></a></p>
					<p class="col-md-6"><a href="/php/basketmanagement.php?action=confirm"><input type="button" class="button" value="Valider le panier"></a></p>
				</div>
			</div>
		</div>
	</div>

</body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?> <!-- rajout du footer -->
</html>
