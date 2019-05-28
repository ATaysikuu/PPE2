<?php
session_start();
require_once("functions.php");
$courseID=null;
$uid=null;
if(isset($_GET['courseid'])){
    $courseID=$_GET['courseid'];
}
if(isset($_SESSION['id'])){
    $uid=$_SESSION['id'];
}
switch($_REQUEST['action']){
    case "addtobasket":
        AddToBasket($courseID,$uid);
        break;
    case "remove":
        RemoveFromBasket($courseID,$uid);
        header("Location: /basket.php");
        break;
    case "confirm":
        BuyBasket($uid);
        header("Location: /client/formationsclient.php");
        break;
    case "empty":
        EmptyBasket($uid);
        header("Location: /basket.php");
}
?>