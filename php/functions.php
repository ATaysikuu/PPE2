<?php

    /**
     * Below are functions related to user management
     */
    
    function AddUser($userData){ //takes an array containing all data required to sign an user up
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //prepare the request that will insert the new user in the database
        $req=$bdd->prepare('INSERT INTO `members` (`firstName_member`, `lastName_member`, `residence_member`, `paypal_member`, `registrationDate_member`, `pseudo_member`, `password`, `admin`, `zipcode_member`, `city_member`, `mail_member`, `statut`) 
                                        VALUES (:name,:surname,:residence,:paypal,:regdate,:pseudo,:pass,:admin,:zipcode,:city,:email,:statut)');
        //execute the request with the array
        $req->execute($userData);
    }
    //updates the user info in the database with the array given (userData)
    function UpdateUser($uid, $userData){
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('UPDATE members SET pseudo_member=:pseudo, firstName_member=:name, lastName_member=:surname, paypal_member=:paypal, mail_member=:email, residence_member=:residence, zipcode_member=:zipcode,city_member=:city WHERE id_member="'.$uid.'"');
        $req->execute($userData);
        header('Location: /admin/client.php?uid='.$uid.'&result=ok');
    }
    //generates a randome string and use it to reset the user password
    function ResetPassword($id){
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('UPDATE members SET password=:newpass WHERE id_member="'.$id.'"');
        $newpass = GeneratePassword();
        $req->execute(['newpass'=>$newpass]);
        header('Location: /admin/client.php?uid='.$id.'&result=ok');
    }
    //removes the user from the database
    function DeleteUser($id){
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //set user status to deleted
        $reqDeleteUser=$bdd->query('UPDATE members SET statut="0" WHERE id_member="'.$id.'"');
    }
    //return the rights of the user (admin, pro or client)
    function UserRole($id){ 
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT admin FROM members WHERE id_member=:id');
        $req->execute(array('id'=>$id));
        
        $result = $req->fetch();

        return $result['admin'];
    }
    //takes a pseudo and return true if the user has admin rights
    function CheckAdmin($pseudo){ 
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
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
     * Course management
     */

     function AddCourse($courseData){
         
     }
     function DeleteCourse($id){
         
     }
     function GetCourses(){

     }
     function GetUnvalidatedCourses(){
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE validation="0"'); //get all waiting courses
        $result=array($req->fetch());
        return $result;
     }
     function ValidateCourse($courseID){
         
     }



     //Generates a random password
     function GeneratePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
    
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
    
        return $result;
    }
?>