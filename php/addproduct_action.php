<?php
session_start(); //creating session
try {
    /** check if the requested variables are set or not. if not, skip. */
    if (isset($_POST['fname']) && //name of the course
        isset($_POST['fcateg'])&& //category of the course
        isset($_POST['fdescription']) && //description of the course
        isset($_POST['fprice'])){ //well, price of the bloody course
        
        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php"); //get config file with db info
        //prepare request to get category id.
        $reqGetIDCateg=$bdd->prepare('SELECT id FROM categories WHERE name_category = :categ');
        //main request. Prepare the sql command. 
        $req=$bdd->prepare('INSERT INTO `articles` (`id_seller`, `id_category`, `date_article`, `name_article`, `price_article`, `quantity_article`, `description_article`) VALUES (:idseller,:idcateg,:date,:name,:price,:quantity,:desc)');
        
        //execute request and get category id given its name.
        $resultIDCateg = $reqGetIDCateg->execute($_POST['fcateg']);
        $IDCateg = $resultIDCateg['id'];

        //create array with data to insert in our main request.
        $insertData = [
            'idseller'=> $_SESSION['id'],
            'idcateg'=>$IDCateg,
            'date'=>date("Y-M-d"),
            'name'=>$_POST['fname'],
            'price'=>$_POST['fprice'],
            'quantity'=>$_POST['fquantity'],
            'desc'=>$_POST['fdescription']
        ];
        
        //execute the insert request with the array
        $req->execute($insertData);
    }
    
} catch (Exception $ex) {

}
header("Location: /");