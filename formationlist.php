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
	
	<div class="container bodycontent">
		<div class="wrapper">
			<h2 style="text-align: center">Liste des formations</h2>
            <div id="listformation" class="row">
                <div class="card">
                    <div class="formationlist col-md-12">
                        <div class="row">
                            <h5 class="col-md-2">Titre</h5>
                            <h5 class="col-md-8">Contenu</h5>
                            <h5 class="col-md-2">Consulter</h5>
                        </div>
                        <hr/>
                        <?php
                            foreach($formationlistvalidated as $formation){ //for each course in the returned array, print its name in html + buttons to accept or refuse course
                        ?>
                        <div class="row formation_list_element">
                            <h6 class="col-md-2"><?php echo ($formation['name_article']);?></h6>
                            <p class="col-md-8"><?php echo ($formation['description_article']);?></p>
                            <p class="col-md-2"><a href="/formation.php?id=<?php echo($formation['id_article'])?>"><input type="button" name="consult" class="button" value="Consulter"></a></p>
                        </div>
                        <hr />
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>
</html>