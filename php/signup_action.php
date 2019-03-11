<?php
$bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
try {
    if (isset($_POST['fpseudo']) &&
        isset($_POST['fname'])&&
        isset($_POST['fsurname']) &&
        isset($_POST['fpass'])&&
        isset($_POST['fresidence']) &&
        isset($_POST['fzipcode'])&&
        isset($_POST['fcity'])){
        
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
            
            $req=$bdd->prepare('INSERT INTO `members` (`pseudo_member`, `pass_member`, `name`, `surname`, `residence`, `zipcode`, `city`, `admin`) VALUES (:pseudo,:pass,:name,:surname,:residence,:zipcode,:city,:admin)');
            
            $req->execute($insertData);
    }
    
} catch (Exception $ex) {

}
header("Location: /");
       
