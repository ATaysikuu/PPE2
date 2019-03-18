<?php session_start();?>
<!DOCTYPE html>

<html>
<!-- a passer en local -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=320, initial-scale=1">

<meta charset="utf-8">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css"> 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

<head>
	<meta charset="utf-8">
	<title>Sell_IT_Accueil</title>
	<link rel="stylesheet" type="text/css" href="Sell_IT_Accueil.css">
	<script type="text/javascript" src="script.js"></script>
</head>
 <!-- a passer en local -->
 
<?php require_once('./include/header.php'); ?>

<body>
	
    <?php
        if (isset($_SESSION['pseudo'])){
            echo($_SESSION['id']);
            echo($_SESSION['pseudo']);
            echo("
                <div class='logoutbutton'>
                    <a href='/logout.php'>LOGOUT</a>
                </div>
            ");
        }
        else {
            echo("
                <div class='loginbutton'>
                    <a href='/login.php'>LOGIN</a>
                </div>
            ");
        }
    ?>
    <a href="product.php?article=2">test</a>
</body>
<?php require_once('./include/footer.php'); ?>
</html>