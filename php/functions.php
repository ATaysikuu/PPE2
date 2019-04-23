<?php
    /**
     * Below are functions related to user management
     */
    
    function AddUser($userData){ //takes an array containing all data required to sign an user up
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //prepare the request that will insert the new user in the database
        $req=$bdd->prepare('INSERT INTO `members` (`firstName_member`, `lastName_member`, `residence_member`, `paypal_member`, `registrationDate_member`, `pseudo_member`, `password`, `role`, `zipcode_member`, `city_member`, `mail_member`, `statut`) 
                                        VALUES (:name,:surname,:residence,:paypal,:regdate,:pseudo,:pass,:role,:zipcode,:city,:email,:statut)');
        //execute the request with the array
        $req->execute($userData);
    }
    //updates the user info in the database with the array given (userData)
    function UpdateUser($uid, $userData){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('UPDATE members SET pseudo_member=:pseudo, firstName_member=:name, lastName_member=:surname, paypal_member=:paypal, mail_member=:email, residence_member=:residence, zipcode_member=:zipcode,city_member=:city WHERE id_member="'.$uid.'"');
        $req->execute($userData);
        header('Location: /admin/client.php?uid='.$uid.'&result=ok');
    }
    //asks for a random string and use it to reset the user password
    function ResetPassword($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('UPDATE members SET password=:newpass WHERE id_member="'.$id.'"');
        $newpass = GeneratePassword();
        $req->execute(['newpass'=>$newpass]);
        header('Location: /admin/client.php?uid='.$id.'&result=ok');
    }
    //reactivates the user (sets status to 1)
    function ReactivateUser($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //set user status to active
        if(CheckAdmin($_SESSION['pseudo'])){
            $reqDeleteUser=$bdd->query('UPDATE members SET statut="1" WHERE id_member="'.$id.'"');
        }
    }
    //deactivates the user (sets status to 0)
    function DeactivateUser($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //set user status to disabled
        if(CheckAdmin($_SESSION['pseudo'])){
            $reqDeleteUser=$bdd->query('UPDATE members SET statut="0" WHERE id_member="'.$id.'"');
        }
    }
    //removes the user from the database
    function DeleteUser($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //remove user from the database. Status needs to be 0 already
        if(CheckUserActive($id)=="0"){
            $reqDeleteUser=$bdd->query('DELETE FROM members WHERE id_member="'.$id.'"');
        }
    }
    //return the rights of the user (admin, pro or client)
    function UserRole($id){ 
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        //require("config.php");
        $req=$bdd->prepare('SELECT role FROM members WHERE id_member=:id');
        $req->execute(array('id'=>$id));
        
        $result = $req->fetch();

        return $result['role'];
    }
    //takes a pseudo and return true if the user has admin rights
    function CheckAdmin($pseudo){ 
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $checkadmin=$bdd->prepare('SELECT * FROM members WHERE pseudo_member = :pseudoReq AND role="0"');
        $checkadmin->execute(array('pseudoReq' => $pseudo));

        $result = $checkadmin->fetch();
        
        if (!$result){
            return false;
        }
        elseif($result['role']=="0"){
            return true;
        }
    }
    //check if the user is active or not
    function CheckUserActive($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT statut FROM members WHERE id_member=:id');
        $req->execute(array('id'=>$id));
        $result = $req->fetch();

        return $result['statut'];
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



    //Return an array containing all ACTIVE clients (where role = 2 && status = 1)
    function GetClients(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE role="2" && statut="1"'); //get all ACTIVE clients
        $result=$req->fetchAll();
        return $result;
    }
    //Return an array containing all INACTIVE clients (where role = 2 && status = 0)
    function GetInactiveClients(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE role="2" && statut="0"'); //get all INACTIVE clients
        $result=$req->fetchAll();
        return $result;
    }

    //Return an array containing all ACTIVE pros (where role = 1 && status = 1)
    function GetPros(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE role="1" && statut="1"'); //get all ACTIVE pros
        $result=$req->fetchAll();
        return $result;
    }


    /**
     * Course management
     */

     //add a new course to the DB. Takes an array containing all the data of this course.
     function AddCourse($courseData){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('INSERT INTO articles(`id_seller`, `id_category`, `date_article`, `name_article`, `description_article`, `price_article`, `validation`)
                            VALUES(:idseller,:idcateg,:date,:name,:desc,:price,:validation)');
        print_r($courseData);
        echo($courseData['idcateg']);
        $req->execute($courseData);
        echo(GetUnvalidatedCourses());
     }
     //remove a course from the DB.
     function DeleteCourse($id){
         require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
         if(CheckAdmin($_SESSION['pseudo'])){
            $req=$bdd->query('DELETE FROM articles WHERE id_article="'.$id.'"');
         }
     }
     //Update a course
     function UpdateCourse($id){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
     }
     //returns an array containing ALL AND EVERY course of the pro. Validated or not.
     function GetAllCoursesPro($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE id_seller="'.$uid.'"'); //get all courses, validated or not
        $result=$req->fetchAll();
        return $result;
     }
     //returns an array containing ALL AND EVERY course in the database. Validated or not.
     function GetAllCourses(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        if(CheckAdmin($_SESSION['pseudo'])){
            $req=$bdd->query('SELECT id_article, name_article, description_article FROM articles'); //get all courses, validated or not
            $result=$req->fetchAll();
            return $result;
        }
     }
     //returns an array containing all courses awaiting validation by an admin.
     function GetUnvalidatedCourses(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        if(CheckAdmin($_SESSION['pseudo'])){
            $req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE validation="0"'); //get all waiting courses
            $result=$req->fetchAll();
            return $result;
        }
     }
     //returns an array containing all courses validated.
     function GetValidatedCourses(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_article, name_article, description_article FROM articles WHERE validation="1"'); //get all validated courses
        $result=$req->fetchAll();
        return $result;
     }
     //set articles.validation to 1
     function ValidateCourse($courseID){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        if(CheckAdmin($_SESSION['pseudo'])){
            $req=$bdd->query('UPDATE articles SET validation="1" WHERE id_article="'.$courseID.'"');
        }
        else echo("NOT ADMIN.");
     }
?>