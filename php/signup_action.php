<?php
//TODO: check for duplicate, salt+hash user pw
require_once("config.php");
require_once("functions.php");
try {
    if (isset($_POST['fname'])&& //user name
        isset($_POST['fsurname']) && //user surname
        isset($_POST['fresidence']) && //user address
        isset($_POST['fpaypal'])&& //user paypal
        isset($_POST['fpseudo']) && //user pseudo        
        isset($_POST['fpass'])&& //user password
        isset($_POST['fzipcode'])&& //user zipcode
        isset($_POST['fcity'])&& //user city
        isset($_POST['fmail'])){ //user mail
        
        //array containing all the data the user has entered in the form
        if(isset($_POST['fpro'])){
            $insertData = [
                'name'=>$_POST['fname'],
                'surname'=>$_POST['fsurname'],
                'residence'=>$_POST['fresidence'],
                'paypal'=>$_POST['fpaypal'],
                'regdate'=>date("Y-m-d"),
                'pseudo'=>$_POST['fpseudo'],
                'pass'=>$_POST['fpass'],
                'role'=>1,
                'zipcode'=>$_POST['fzipcode'],
                'city'=>$_POST['fcity'],
                'email'=>$_POST['fmail'],
                'statut'=>0
            ];
            AddUser($insertData);
        }
        else{
            $insertData = [
                'name'=>$_POST['fname'],
                'surname'=>$_POST['fsurname'],
                'residence'=>$_POST['fresidence'],
                'paypal'=>$_POST['fpaypal'],
                'regdate'=>date("Y-m-d"),
                'pseudo'=>$_POST['fpseudo'],
                'pass'=>$_POST['fpass'],
                'role'=>2,
                'zipcode'=>$_POST['fzipcode'],
                'city'=>$_POST['fcity'],
                'email'=>$_POST['fmail'],
                'statut'=>1
            ];
            AddUser($insertData);
        }
    }
    
} catch (Exception $ex) {
echo($ex);
}
header("Location: /login.php");
       
