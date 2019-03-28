<?php
    require_once("functions.php");
    switch($_REQUEST['action']){
        case "del":
            DeleteUser($_REQUEST['uid']);
            break;
        case "up":
            $userData = [
                'pseudo'=>$_POST['pseudo'],
                'name'=>$_POST['firstname'],
                'surname'=>$_POST['lastname'],
                'residence'=>$_POST['residence'],
                'paypal'=>$_POST['paypal'],
                'zipcode'=>$_POST['zipcode'],
                'city'=>$_POST['city'],
                'email'=>$_POST['mail']
            ];
            UpdateUser($_REQUEST['uid'], $userData);
            break;
        case "res":
            ResetPassword($_REQUEST['uid']);
            break;
    }
?>