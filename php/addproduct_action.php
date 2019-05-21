<?php
session_start(); //creating session
require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
if(isset($_SESSION)){
    $uid=$_SESSION['id'];
		if(!(UserRole($uid)=="0"||UserRole($uid)=="1")){
			header('Location: /');
		}
	}
	else header('Location: /');
try {
    //echo($_POST['fcateg']);
    /** check if the requested variables are set or not. if not, skip. */
    if (isset($_POST['title']) && //name of the course
        isset($_POST['price'])&& //category of the course
        isset($_POST['categ']) && //description of the course
        isset($_POST['desc'])){ //well, price of the bloody course

            $insertData=[
                'idseller'=>$uid,
                'idcateg'=>GetCategoryId($_POST['categ']),
                'date'=>date("Y-m-d"),
                'name'=>$_POST['title'],
                'desc'=>$_POST['desc'],
                'price'=>$_POST['price'],
                'validation'=>"0"
            ];
            AddCourse($insertData);
            header('Location: /pro/formationlist.php');
    }
    
} catch (Exception $ex) {
echo $ex;
}