<?php
session_start();
require_once("functions.php");
if(isset($_REQUEST['id'])){
    $idformation=$_REQUEST['id'];
    if(CheckAdmin($_SESSION['pseudo'])){
        if($_REQUEST['action']=='ok'){
            ValidateCourse($idformation);
            header("Location: /admin/formationlist.php");
        }
        if($_REQUEST['action']=='no'){
            DeleteCourse($idformation);
            header("Location: /admin/formationlist.php");
        }
        if($_REQUEST['action']=='unvalidate'){
            UnvalidateCourse($idformation);
            header("Location: /admin/formationlist.php");
        }
        if($_REQUEST['action']=='delete'){
            DeleteCourse($idformation);
            header("Location: /admin/formationlist.php");
        }
        if($_REQUEST['action']=='update'){
            $categID=GetCategoryId($_POST['formationcategory']);
            $courseData=[
                'formationname'=>$_POST['formationname'],
                'formationprice'=>$_POST['formationprice'],
                'formationcategory'=>$categID,
                'formationcontent'=>$_POST['formationcontent'],
                'idformation'=>$idformation
            ];
            UpdateCourse($courseData);
            header("Location: /admin/formationlist.php");
        }
    }
}

else{
    echo("fail");
}
?>