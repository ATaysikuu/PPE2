<?php session_start();?>
<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php'); 
?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
    <title>Sell_IT_Accueil</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=320, initial-scale=1">
    <script src="/js/jquery331.js"></script> 
</head>
 <!-- a passer en local -->
 
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php'); ?>

<body>
    <div class="container bodycontent">
        <div class="wrapper">
            <div class="row">
                <?php 
                    if(!isset($_SESSION['id'])){
                        echo('
                        <div class="col-md-4">
                        <div class="card" id="connexion">
                        <p>Connectez-vous pour accéder à vos formations.<br/></p>
                        <div class="clear"></div>
                        <a href="/login.php"><input type="button" name="connexion" class="button" value="Se connecter"></a>
                        </div>
                        </div>  
                        <div class="col-md-4">
                        <div class="card" id="formations">
                            <p>Consultez les différentes formations proposées.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/formationlist.php"><input type="button" name="formations" class="button" value="Formations"></a></p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card" id="contact">
                            <p>Contactez-nous pour toute question.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/contact.php"><input type="button" name="contact" class="button" value="Nous contacter"></a></p>
                        </div> 
                        </div> 
                        ');
                    }
                    elseif (UserRole($_SESSION['id'])=="0") {
                        header('Location: /admin/index.php');
                    }
                    elseif (UserRole($_SESSION['id'])=="1") {
                        echo('
                        <div class="col-md-4">
                        <div class="card" id="connexion">
                        <p>Consultez vos formations mises en ligne<br/></p>
                        <div class="clear"></div>
                        <a href="/pro/formationlist.php"><input type="button" name="mesformations" class="button" value="Mes formations"></a>
                        </div>  
                        </div>
                        <div class="col-md-4">
                        <div class="card" id="formations">
                            <p>Consultez les différentes formations proposées.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/formationlist.php"><input type="button" name="formations" class="button" value="Formations"></a></p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card" id="contact">
                            <p>Contactez-nous pour toute question.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/contact.php"><input type="button" name="contact" class="button" value="Nous contacter"></a></p>
                        </div>  
                        </div>
                        ');
                    }
                    elseif (UserRole($_SESSION['id'])=="2") {
                        echo('
                        <div class="col-md-4">
                        <div class="card" id="connexion">
                        <p>Consultez vos formations<br/></p>
                        <div class="clear"></div>
                        <a href="/client/formationsclient.php"><input type="button" name="mesformations" class="button" value="Mes formations"></a>
                        </div>  
                        </div>
                        <div class="col-md-4">
                        <div class="card" id="formations">
                            <p>Consultez les différentes formations proposées.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/formationlist.php"><input type="button" name="formations" class="button" value="Formations"></a></p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card" id="contact">
                            <p>Contactez-nous pour toute question.</p><br/>
                            <div class="clear"></div>
                            <p><a href="/contact.php"><input type="button" name="contact" class="button" value="Nous contacter"></a></p>
                        </div>  
                        </div>
                        ');
                    }
                ?>
            </div>
        </div> <!-- wrapper-->
        
    
    </div><!-- container -->
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php'); ?>
</html>