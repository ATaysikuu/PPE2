<?php session_start();?>
<!DOCTYPE html>
<head>
</head>
<?php require_once('./include/header.php'); ?>
<?php

    try {
        require_once("./php/config.php");
        $req=$bdd->prepare('SELECT * FROM articles WHERE id_article = :id_art_Req');
        $idArticle = $_GET['id'];
        
        $req->execute(array('id_art_Req' => $idArticle));
        while($result=$req->fetch()){
            $articleName = $result['name_article'];
            $articleDescription = $result['description_article'];
            $articlePrice = $result['price_article'];
        }
    }
    catch (Exception $e){
        echo($e);
    }
?>

<div class="product_info">
    <h3><?php echo($articleName);?></h3><br/>
    <h4><?php echo($articleDescription);?></h4><br/>
    <h4><?php echo($articlePrice);?></h4><br/>
</div>
</html>
<?php require_once('./include/footer.php'); ?>