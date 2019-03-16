<?php 
    try {
        require_once("./php/config.php");
        $req=$bdd->prepare('SELECT pseudo_member, admin FROM members WHERE pseudo_member = :pseudoReq AND pass_member = :passReq');

        $pseudoEntre = $_POST['pseudo'];
        $passEntre = $_POST['pass'];
        $req->execute(array('pseudoReq' => $pseudoEntre, 'passReq' => $passEntre));

        $result = $req->fetch();

        if ($result && $result['admin']==1){
            //echo ('admin');*
            session_start();
            $_SESSION['pseudo'] = $pseudoEntre;
            //header("Location : index.php");
            echo '<script>document.location="index.php"</script>';
            //include "index.php";
            exit;
        }
        else if ($result && $result['admin']!=1){
            //echo ('user');
            session_start();
            $_SESSION['pseudo'] = $pseudoEntre;
            //header ('Location : listing.php');
            //echo '<script>document.location="listing.php"</script>';
        }
        else {
            echo ("FATAL ERROR - ID/PASS");
            //include ('Location : index.php');
        }
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
        }
?>