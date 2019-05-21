<?php

    /**************************************************/
    /* Below are functions related to user management */
    /**************************************************/
    
    //takes an array containing all data required to sign an user up
    function AddUser($userData){ 
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
        //header('Location: /admin/client.php?uid='.$uid.'&result=ok&'.print_r($userData));
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
    function GeneratePassword($length = 80) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
    
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
    
        return $result;
    }


    //return the requested user
    function GetUser($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member,lastName_member,residence_member,paypal_member,zipcode_member,city_member,mail_member FROM members WHERE id_member="'.$uid.'"');
        $result=$req->fetch();
        return $result; 
    }
    //Return an array containing all ACTIVE pros (where role = 1 && status = 1)
    function GetPros(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE role="1" && statut="1"'); //get all ACTIVE pros
        $result=$req->fetchAll();
        return $result;
    }
    //Return an array containing all ACTIVE pros (where role = 1 && status = 1)
    function GetInactivePros(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_member, pseudo_member, firstName_member, lastName_member FROM members WHERE role="1" && statut="0"'); //get all ACTIVE pros
        $result=$req->fetchAll();
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



    /*********************/
    /* Course management */
    /*********************/

    //Returns an array containing all categories
    function GetCategories(){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT * FROM categories');
        $req->execute();
        $result=$req->fetchAll();
        return $result;
    }
    //returns the id of a specific category
    function GetCategoryId($categName){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_category FROM categories WHERE name_category="'.$categName.'"');
        $result=$req->fetch();
        return($result['id_category']);
    }
     //add a new course to the DB. Takes an array containing all the data of this course.
     function AddCourse($courseData){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('INSERT INTO articles(`id_seller`, `id_category`, `date_article`, `name_article`, `description_article`, `price_article`, `validation`)
                            VALUES(:idseller,:idcateg,:date,:name,:desc,:price,:validation)');
        $req->execute($courseData);
     }
     //remove a course from the DB.
     function DeleteCourse($id){
         require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
            $req=$bdd->query('DELETE FROM articles WHERE id_article="'.$id.'"');
     }
     //Update a course
     function UpdateCourse($courseData){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('UPDATE articles 
                            SET name_article=:formationname, price_article=:formationprice, id_category=:formationcategory, description_article=:formationcontent 
                            WHERE id_article=:idformation');
        $req->execute($courseData);
     }
     //returns the requested course. Validated or not.
     function GetCourse($idcourse){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT DISTINCT articles.id_article, articles.name_article, articles.date_article, articles.description_article, articles.price_article, members.pseudo_member 
                            FROM `articles` INNER JOIN members ON articles.id_seller=members.id_member WHERE articles.id_article=:idformation'); //get the requested course
        $req->execute(array('idformation'=>$idcourse));
        $result=$req->fetch();
        return $result;
     }
     //returns an array containing the courses bought by the user
     function GetCoursesUser($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT DISTINCT articles.id_article, articles.name_article, articles.description_article FROM articles INNER JOIN soldarticles on soldarticles.id_article=articles.id_article INNER JOIN members WHERE soldarticles.id_buyer=:uid');
        $req->execute(array('uid'=>$uid));
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
        $req=$bdd->query('SELECT DISTINCT members.pseudo_member, id_article, name_article, description_article 
                            FROM articles INNER JOIN members on members.id_member=articles.id_seller WHERE validation="1" '); //get all validated courses
        $result=$req->fetchAll();
        return $result;
     }
     //returns an array containing ALL AND EVERY course of the pro. Validated or not.
     function GetAllCoursesPro($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->query('SELECT id_article, name_article, description_article, date_article, price_article, validation FROM articles WHERE id_seller="'.$uid.'"'); //get all courses, validated or not
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
     //set articles.validation to 0
     function UnValidateCourse($courseID){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        if(CheckAdmin($_SESSION['pseudo'])){
            $req=$bdd->query('UPDATE articles SET validation="0" WHERE id_article="'.$courseID.'"');
        }
        else echo("NOT ADMIN.");
     }
     //checks if an user has bought this course or not. Returns true if he did buy the formation, false otherwise
     function UserHasCourse($courseID, $uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT COUNT(*) FROM soldarticles WHERE id_article=:courseid AND id_buyer=:uid');
        $req->execute(array(
            'courseid'=>$courseID,
            'uid'=>$uid
        ));
        $bought=$req->fetch();
        if($bought[0]!="0") return true;
        return false;
     }


     /********************/
     /* BASKET MANAGEMENT*/
     /********************/

     //add a course to the basket
     function AddToBasket($id, $uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $checkDuplicate=$bdd->prepare('SELECT COUNT(*) FROM basket WHERE id_article=:id AND id_client=:uid');
        $checkDuplicate->execute(array(
            'id'=>$id,
            'uid'=>$uid));
        $duplicate=$checkDuplicate->fetch();
        if($duplicate[0]=="0"){
            $req=$bdd->prepare('INSERT INTO basket (id_article, id_client) VALUES(:id,:uid)');
            $req->execute(array(
                'id'=>$id,
                'uid'=>$uid));
        }
     }
     //remove a course from the basket
     function RemoveFromBasket($id, $uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('DELETE FROM basket WHERE id_article=:id AND id_client=:uid');
        $req->execute(array(
            'id'=>$id,
            'uid'=>$uid
        ));
     }
     //empties the user's basket
     function EmptyBasket($uid){
        $basketContent=GetBasket($uid);
        foreach($basketContent as $element){
            RemoveFromBasket($element['id_article'],$uid);
        }
     }
     //returns an array containing the content of the client's basket
     function GetBasket($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT DISTINCT articles.id_article, articles.name_article, articles.description_article, articles.price_article 
                            FROM articles INNER JOIN basket on basket.id_article=articles.id_article INNER JOIN members WHERE members.id_member=:uid');
        $req->execute(array('uid'=>$uid));
        $result=$req->fetchAll();
        return $result;
     }
     //returns number of elements in basket
     function GetBasketSize($uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('SELECT COUNT(*) FROM basket where id_client=:uid');
        $req->execute(array('uid'=>$uid));
        $result=$req->fetch();
        return $result;
     }
     
     /********************/
     /* ORDERS MANAGEMENT*/
     /********************/

     //Add the course to the user's order history
     function AddToOrderHistory($courseID, $uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('INSERT INTO orderhistory (id_buyer, id_course) VALUES (:courseid,:uid)');
        $req->execute(array(
            'courseid'=>$courseID,
            'uid'=>$uid
        ));
     }
     //Add the course to the orders history
     function AddToSoldArticles($courseID, $uid){
        require($_SERVER['DOCUMENT_ROOT']."/php/config.php");
        $req=$bdd->prepare('INSERT INTO soldarticles(id_article, id_buyer, date_order) VALUES(:courseid, :uid, :dateorder)');
        $req->execute(array(
            'courseid'=>$courseID,
            'uid'=>$uid,
            'dateorder'=>date("Y-m-d")
        ));
     }
     //Add the basket's content in the list of course the user has bought
     function BuyBasket($uid){
        $basketContent=GetBasket($uid);
        foreach ($basketContent as $element) {
            AddToSoldArticles($element['id_article'],$uid);
            RemoveFromBasket($element['id_article'],$uid);
        }
     }
?>