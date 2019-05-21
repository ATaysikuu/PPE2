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
	<div class="container">
		<div class="wrapper">
			<div class="row" id="basket">
				<table>
					<tr>
						<th colspan="3">Contenu du panier</th></tr>
					<tr>
						<td>NOM</td>
						<td>DESCRIPTION</td>
						<td>PRIX</td>
					<tr>
					<?php
						foreach($basketContent as $element){
					?>
					<tr>
						<td><?php echo ($element['name_article']);?></td>
						<td><?php echo ($element['description_article']);?></td>
						<td><?php echo ($element['price_article']."€");?></td>
						<td><a href="/php/basketmanagement.php?action=remove&courseid=<?php echo($element['id_article']);?>">Supprimer du panier</a>
					</tr>
					<?php
					$total+=$element['price_article'];
						}
					?>
					<tr><td colspan="3">Prix Total: <?php echo ($total."€");?>
					<tr>
						<td><a href="/php/basketmanagement.php?action=empty" class="button">Vider le panier</a></td>
						<td><a href="/php/basketmanagement.php?action=confirm" class="button">Valider le panier</a></td></tr>
				</table>
			</div>
		</div>
	</div>

</body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?> <!-- rajout du footer -->
</html>
