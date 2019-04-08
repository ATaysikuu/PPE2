<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formation achetee par le client</title>
<!-- faire une page pour les formatons achetees du client -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/php/config.php') ?>
	<div class="container">
		<div class="wrapper">
			<h2><!-- afficher le nom de la formation -->
                                Formation:
                                <?php 
                                        $reqGetNameFormation=$bdd->query('SELECT name_article FROM articles WHERE id_article="'.$_GET['id'].'"');
                                        while ($res=$reqGetNameFormation->fetch()){
                                                echo($res['name_article']);
                                        }
                                  ?>
                        </h2>
			<div id="formation_buy">
				<div id="formation_info">
                                    <ul>
                                        <table>
                                            <tr><!-- afficher le nom du professionnel de la formation -->
                                                Nom du professionnel:
                                            <?php 
                                                    $reqGetNamePro=$bdd->query('SELECT DISTINCT pseudo_member FROM members WHERE id_member=(SELECT articles.id_seller FROM articles WHERE articles.id_article="'.$_GET['id'].'")');
                                                    while($res=$reqGetNamePro->fetch()){
                                                        echo($res['pseudo_member']);
                                                    }
                                            ?>
                                            </tr><br><br>
                                            <tr><!-- afficher la catégorie de la formation -->
                                                Catégorie:
                                                <?php
                                                        $reqGetNameCategory=$bdd->query('SELECT name_category FROM categories WHERE id_category=(SELECT id_category FROM articles WHERE id_article="'.$_GET['id'].'")');
                                                        while($res=$reqGetNameCategory->fetch()){
                                                            echo($res['name_category']);
                                                        }
                                                ?>
                                                
                                            </tr>
                                           
                                        </table>
                                        
                                    </ul>
						

				</div>
				<br>
				<div id="formation_content">
					<h3>Contenu de la formation</h3>
					<!-- php mettre la video de la formation -->
                                        <?php 
                                           // :) lol mais yen a pas 
                                        ?>
				</div>
				<br>
				<div id="formation_review">
					<!-- faire un formulaire pour donner son avis -->
					<form method="post">
						<input type="text" name="review" value="Donnez votre avis">
						<input type="button" name="submit" value="Soumettre">
					</form>
				</div>

			</div> <!-- div formation_buy -->
		</div> <!-- div wrapper-->
	</div> <!-- div container -->
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>
