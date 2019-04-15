<?php
session_start(); //creating session
require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
try {
    echo($_POST['fcateg']);
    /** check if the requested variables are set or not. if not, skip. */
    if (isset($_POST['fname']) && //name of the course
        isset($_POST['fcateg'])&& //category of the course
        isset($_POST['fdescription']) && //description of the course
        isset($_POST['fprice'])){ //well, price of the bloody course

            require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php"); //get config file with db info
            //get category id
            $reqGetIDCateg=$bdd->query('SELECT id_category FROM categories WHERE name_category = "'.$_POST['fcateg'].'"');
            $resultId=$reqGetIDCateg->fetch();
            $IDCateg=$resultId['id_category'];

            //create array with data to insert in our main request.
            $insertData = [
                'idseller'=> $_SESSION['id'],
                'idcateg'=>$IDCateg,
                'date'=>date("Y-m-d"),
                'name'=>$_POST['fname'],
                'desc'=>$_POST['fdescription'],
                'price'=>$_POST['fprice'],
                'validation'=>"0"
            ];
            
            AddCourse($insertData);
            //execute the insert request with the array
            //$req->execute($insertData);
    }
    
} catch (Exception $ex) {

}
//header("Location: /");