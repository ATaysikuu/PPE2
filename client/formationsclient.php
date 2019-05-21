<?php session_start(); ?>
<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
    $formationslist=GetCoursesUser($_SESSION['id']);?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des formations du client</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/php/config.php') ?>
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations achetées</h2>
			<!-- liste des formations achetees par le client en php -->
                <div id="formation_client">
                <table>
                    <th colspan="4">Formations achetées</th></tr>
                    <tr>
                        <td>NOM</td>
                        <td>DESCRIPTION</td>
                        <td>CONSULTER</td>
                    <tr>
                    <?php
                        foreach($formationslist as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
                    ?>
                    <tr>
                        <td><?php echo ($formation['name_article']);?></td>
                        <td><?php echo ($formation['description_article']);?></td>
                        <td><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter">');?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                        
                </div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>

<!-- php rappeler page formation -->

