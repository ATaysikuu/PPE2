<?php
    require_once("functions.php");
    switch($_GET['action']){
        case "del":
            DeleteUser($_GET['uid']);
            break;
        case "up":
            UpdateUser($_GET['uid']);
            break;
        case "res":
            ResetPassword($_GET['uid']);
            break;
    }
?>