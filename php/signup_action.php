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
        $insertData = [
            'name'=>$_POST['fname'],
            'surname'=>$_POST['fsurname'],
            'residence'=>$_POST['fresidence'],
            'paypal'=>$_POST['fpaypal'],
            'regdate'=>date("Y-m-d"),
            'pseudo'=>$_POST['fpseudo'],
            'pass'=>$_POST['fpass'],
            'admin'=>0,
            'zipcode'=>$_POST['fzipcode'],
            'city'=>$_POST['fcity'],
            'email'=>$_POST['fmail'],
            'statut'=>1
        ];
            //prepare the request that will insert the new user in the database
            //$req=$bdd->prepare('INSERT INTO `members` (`pseudo_member`, `pass_member`, `name`, `surname`, `residence`, `zipcode`, `city`, `admin`) VALUES (:pseudo,:pass,:name,:surname,:residence,:zipcode,:city,:admin)');
            //execute the request with the array
            //$req->execute($insertData);
            AddUser($insertData);
    }
    
} catch (Exception $ex) {
echo($ex);
}
header("Location: /");
       
