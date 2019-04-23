<?php
session_start();
    require_once("functions.php");
    switch($_REQUEST['action']){
        case "deactivate":
            DeactivateUser($_REQUEST['uid']);
            if($_REQUEST['list']=="1"){
                header("Location: /admin/clientlist.php");
            }
            break;
        case "reactivate":
            ReactivateUser($_REQUEST['uid']);
            if($_REQUEST['list']=="1"){
                header("Location: /admin/clientlist.php");
            }
            break;
        case "delete":
            DeleteUser($_REQUEST['uid']);
            if($_REQUEST['list']=="1"){
                header("Location: /admin/clientlist.php");
            }
            break;
        case "update":
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
            if($_REQUEST['list']=="1"){
                header("Location: /admin/clientlist.php");
            }
            break;
        case "resetpass":
            ResetPassword($_REQUEST['uid']);
            if($_REQUEST['list']=="1"){
                header("Location: /admin/clientlist.php");
            }
            break;
    }
?>