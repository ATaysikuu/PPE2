<?php session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	$formationlistvalidated=GetValidatedCourses();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page admin liste formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	
	<div class="container">
		<div class="wrapper">
			<h2>Liste des formations</h2>
			<div id="listformation" class="row">
                <div class="formationlist col-md-12">
                    <ul>
                            <table>
                                <th colspan="4">Formations mises en ligne</th></tr>
                                <tr>
                                    <td>NOM</td>
                                    <td>AUTEUR</td>
                                    <td>CONSULTER</td>
                                <tr>
                                <?php
                                    foreach($formationlistvalidated as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
                                ?>
                                <tr>
                                    <td><?php echo ($formation['name_article']);?></td>
                                    <td><?php echo ($formation['pseudo_member']);?></td>
                                    <td><?php echo ('<a href="/formation.php?id='.$formation["id_article"].'"><input type="button" name="consult" class="button" value="Consulter">');?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                    </ul>
                </div>
		</div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>