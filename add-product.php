<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sell product</title>
    </head>
    <body>
        <form id="addproductForm" action="/php/addproduct_action.php" method=POST>
            <input type="text" id="fname" name="fname" placeholder="nom de l'objet"><br/>
            <input type="text" id="fcateg" name="fcateg" placeholder="categorie"><br/>
            <input type="text" id="fdescription" name="fdescription" placeholder="description de l'article"><br/>
            <input type="number" id="fprice" name="fprice" placeholder="prix"><br/>
            <input type="number" id="fquantity" name="fquantity" placeholder="quantité"><br/>
            
            <input type="submit" id="fsubmit" name="submit" value="Mettre en vente">
        </form>
        <br />
        <p> Déjà inscrit? Cliquez <a href="/login.php">ici</a></p>
    </body>
</html>
