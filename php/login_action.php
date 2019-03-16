<?php 
    try {
        require_once("config.php");
        $req=$bdd->prepare('SELECT id_member, pseudo_member, admin FROM members WHERE pseudo_member = :pseudoReq AND password = :passReq');

        if (isset($_POST['pseudo'])&&isset($_POST['pass'])){
            $pseudoEntre = $_POST['pseudo'];
            $passEntre = $_POST['pass'];
            $req->execute(array('pseudoReq' => $pseudoEntre, 'passReq' => $passEntre));

            $result = $req->fetch();

            if ($result && $result['admin']==1){
                session_start();
                $_SESSION['pseudo'] = $pseudoEntre;
                $_SESSION['id'] = $result['id_member'];
                //header("Location : index.php");
                echo '<script>document.location="/index.php"</script>';
                exit;
            }
            else if ($result && $result['admin']!=1){
                //echo ('user');
                session_start();
                $_SESSION['pseudo'] = $pseudoEntre;
                //header ('Location : listing.php');
                echo '<script>document.location="/index.php"</script>';
            }
            else {
                echo ("FATAL ERROR - ID/PASS");
                //include ('Location : index.php');
            }
        }
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
        }
?>