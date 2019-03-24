<?php
    require_once("functions.php");
    switch($_GET['action']){
        case "del":
            DeleteUser($_GET['uid']);
    }
?>