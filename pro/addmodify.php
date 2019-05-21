<?php session_start() ?>
<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	if(isset($_SESSION['id'])){
		$uid=$_SESSION['id'];
		if(!(UserRole($uid)=="0"||UserRole($uid)=="1")){
			header('Location: /');
		}
	}
	else header('Location: /');
	$categorieslist=GetCategories();
?>
<!DOCTYPE html>
<html>
<head>
	<title>page connexion professionnel</title><!-- page ajouter/modifier du professionnel -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<div class="container">
		<div class="wrapper">
			<div id="form_formation">
				<form id="formaddformation" method="POST" action="/php/addproduct_action.php">
					<div class="form-group row">
						<div class="col-md-3">
							<label for="title">Titre de la formation: </label><br />
							<label for="price">Prix de la formation: </label><br />
							<label for="categ">Catégorie de la formation: </label><br />
							<label for="desc">Description de la formation: </label><br />
						</div>
						<div class="col-md-6">
							<input type="text" name="title" placeholder="Titre..."><br />
							<input type="text" name="price" placeholder="Prix..."><br />
							<select name="categ">
								<?php foreach($categorieslist as $category){ ?>
									<option name="<?php echo($category['name_category'])?>"><?php echo($category['name_category'])?></option><br />
								<?php } ?>
							</select><br/>
							<textarea name="desc" rows="4" cols="50" placeholder="Description..."></textarea><br />
						</div>
					</div>
					<input type="submit" value="Enregistrer">
				</form> 
			</div>
		</div><!-- wrapper-->
	</div><!-- container -->
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>

