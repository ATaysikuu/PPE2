<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=sell_it;charset=utf8', 'root', '');
}
catch (Exception $e){
    echo $e;
}
?>