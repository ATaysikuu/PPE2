<?php
//TODO: check for duplicate, salt+hash user pw
require_once("config.php");
try {
    if (isset($_POST['fpseudo']) && //user pseudo
        isset($_POST['fname'])&& //user name
        isset($_POST['fsurname']) && //user surname
        isset($_POST['fpass'])&& //user password
        isset($_POST['fresidence']) && //user address
        isset($_POST['fzipcode'])&& //user zipcode
        isset($_POST['fcity'])){ //user city
        
        //array containing all the data the user has entered in the form
        $insertData = [
            'pseudo'=>$_POST['fpseudo'],
            'pass'=>$_POST['fname'],
            'name'=>$_POST['fname'],
            'surname'=>$_POST['fpseudo'],
            'residence'=>$_POST['fpseudo'],
            'zipcode'=>$_POST['fname'],
            'city'=>$_POST['fcity'],
            'admin'=>0
        ];
            //prepare the request that will insert the new user in the database
            $req=$bdd->prepare('INSERT INTO `members` (`pseudo_member`, `pass_member`, `name`, `surname`, `residence`, `zipcode`, `city`, `admin`) VALUES (:pseudo,:pass,:name,:surname,:residence,:zipcode,:city,:admin)');
            //execute the request with the array
            $req->execute($insertData);
    }
    
} catch (Exception $ex) {

}
header("Location: /");
       
