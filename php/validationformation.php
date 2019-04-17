<?php
session_start();
require_once("functions.php");
echo($_SESSION['pseudo']);
if(CheckAdmin($_SESSION['pseudo'])){
    if($_GET['action']=='ok'){
        $idformation=$_GET['id'];
        ValidateCourse($idformation);
        //$reqAcceptFormation=$bdd->query('UPDATE articles SET validation = "1" where id_article = "'.$idformation.'"');
        //header("Location: /admin/formationlist.php");
        echo('<script>document.location="/admin/formationlist.php"</script>');
    }
    if($_GET['action']=='no'){
        $idformation=$_GET['id'];
        DeleteCourse($idformation);
        //$reqAcceptFormation=$bdd->query('DELETE FROM articles where id_article = "'.$idformation.'"');
        //header("Location: /admin/formationlist.php");
        echo('<script>document.location="/admin/formationlist.php"</script>');
    }
}
else{
    echo("fail");
}
?>