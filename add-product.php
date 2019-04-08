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
       
        <form id="addproductForm" action="../php/addproduct_action.php" method=POST>
            <input type="text" id="fname" name="fname" placeholder="nom de l'objet"><br/>
            <input type="text" id="fdescription" name="fdescription" placeholder="description de l'article"><br/>
            <input type="number" id="fprice" name="fprice" placeholder="prix"><br/>
            <input type="number" id="fquantity" name="fquantity" placeholder="quantité"><br/>
            <input list="fcateg">
                <datalist id="fcateg">
                    <!-- GET ALL CATEGORIES FROM DB -->
                    <?php
                        require_once($_SERVER['DOCUMENT_ROOT']."/php/config.php");
                        $req=$bdd->query('SELECT name_category FROM categories');
                        while($result=$req->fetch()){ //for each category in the returned array, print its name in html.
                            ?>
                            <!-- PRINT NAME -->
                            <option value="<?php echo ($result['name_category']);?>">
                            <?php
                        }
                    ?>
                </datalist>
            <input type="submit" id="fsubmit" name="submit" value="Mettre en vente">
        </form>
        <br />
        <p> Déjà inscrit? Cliquez <a href="./login.php">ici</a></p>
    </body>
</html>
