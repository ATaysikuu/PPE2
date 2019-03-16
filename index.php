<?php session_start();?>
<!DOCTYPE html>

<html>

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


<style>



</style>


<body>
	<div id="container0" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div id="container1" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 "><!--Logo/Menu-->
			<div class="menu">
     			<img id="menu_img" src="menu_sell_IT.jpeg">
   			</div>
   		</div>
   		<div id="container2" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
    		<div class="logo">
     			<img id="logo_img" src="logo_sell_IT.jpeg">
   			</div>
		</div>
	</div>
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

</html>