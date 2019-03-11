<?php session_start();?>
<!DOCTYPE html>
<head>
</head>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');

    try {
        
        $req=$bdd->prepare('SELECT * FROM articles WHERE id_article = :id_art_Req');
        $idArticle = $_GET['article'];
        
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

<div class="product_name">
    <h3><?php echo($articleName);?></h3><br/>
    <h4><?php echo($articleDescription);?></h4><br/>
    <h4><?php echo($articlePrice);?></h4><br/>
</div>
</html>