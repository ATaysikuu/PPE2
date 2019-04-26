<?php
session_start();
require_once("functions.php");
$courseID=$_GET['id'];
$uid=$_SESSION['id'];
switch($_REQUEST['action']){
    case "addtobasket":
        AddToBasket($courseID,$uid);
        break;
    case "remove":
        RemoveFromBasket($id);
        break;
}
?>