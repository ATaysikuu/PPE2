<?php
    
    function CheckAdmin($pseudo){ //takes a pseudo and return true if the user has admin rights
        $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
        $checkadmin=$bdd->prepare('SELECT * FROM members WHERE pseudo_member = :pseudoReq AND admin="1"');
        $checkadmin->execute(array('pseudoReq' => $pseudo));

        $result = $checkadmin->fetch();
        
        if (!$result){
            return false;
        }
        elseif($result['admin']=="1"){
            return true;
        }
    }

    /**
     * Below are functions related to user management
     */
    
    function AddUser($userData){ //takes an array containing all data required to sign an user up
        $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
        //prepare the request that will insert the new user in the database
        $req=$bdd->prepare('INSERT INTO `members` (`firstName_member`, `lastName_member`, `residence_member`, `paypal_member`, `registrationDate_member`, `pseudo_member`, `password`, `admin`, `zipcode_member`, `city_member`, `mail_member`, `statut`) 
                                        VALUES (:name,:surname,:residence,:paypal,:regdate,:pseudo,:pass,:admin,:zipcode,:city,:email,:statut)');
        //execute the request with the array
        $req->execute($userData);
    }
    function UpdateUser($userData){
        $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
        $req=$bdd->prepare('UPDATE members SET firstName_member=:name, lastName_member=:surname, paypal_member=:paypal, mail_member=:email, residence_member=:residence, zipcode_member=:zipcode,city_member=:city');
        $req->execute($userData);
    }
    function DeleteUser($id){
        $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
        //set user status to deleted
        $reqDeleteUser=$bdd->query('UPDATE members SET statut="0" WHERE id_member="'.$id.'"');
    }

    function UserRole($id){ //return the rights of the user (admin, pro or client)
        $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
        $req=$bdd->prepare('SELECT admin FROM members WHERE id_member=:id');
        $req->execute(array('id'=>$id));
        
        $result = $req->fetch();

        return $result['admin'];
    }

    /**
     * Course management
     */

     function AddFormation($courseData){
         
     }
     function DeleteCourse($id){
         
     }
?>