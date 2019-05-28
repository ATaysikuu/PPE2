<?php
    session_start();
    require_once("functions.php");
    if(!isset($_SESSION['id'])){
        header('Location: /');
    }

    if($_GET['action']=='submit'){
        $courseid=$_GET['courseid'];
        $message=$_POST['fmessage'];
        AddReview($courseid,$_SESSION['id'],$message);
        header('Location: /formation.php?id='.$courseid);
    }
?>