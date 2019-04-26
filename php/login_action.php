<?php 
    try {
        require_once("config.php");
        //prepare a request that will return the corresponding member name, id, and rights, given a pseudo and password.
        $req=$bdd->prepare('SELECT id_member, pseudo_member, role FROM members WHERE pseudo_member = :pseudoReq AND password = :passReq');

        if (isset($_POST['pseudo'])&&isset($_POST['pass'])){
            $pseudoEntre = $_POST['pseudo'];
            $passEntre = $_POST['pass'];
            //execute our request ONLY if the requested variables are set. 
            $req->execute(array('pseudoReq' => $pseudoEntre, 'passReq' => $passEntre));

            $result = $req->fetch();

            if ($result && $result['role']==0){
                //in this case the request returned an user with admin rights
                session_start();
                $_SESSION['pseudo'] = $pseudoEntre;
                $_SESSION['id'] = $result['id_member'];
                echo '<script>document.location="/index.php"</script>'; //echo a JS script that will immediately take the user to /index.
                exit;
            }
            else if ($result && $result['role']!=0){
                //echo ('user');
                session_start();
                $_SESSION['pseudo'] = $pseudoEntre;
                $_SESSION['id'] = $result['id_member'];
                echo '<script>document.location="/index.php"</script>'; //echo a JS script that will immediately take the user to /index.
            }
            else {
                echo ("FATAL ERROR - ID/PASS"); //user failed to log.
            }
        }
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
        }
?>