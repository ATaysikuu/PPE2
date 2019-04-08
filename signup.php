<?php session_start(); ?>
<?php include './php/config.php' ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>S'inscrire</title>
    </head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php'); ?>
    <body>
        <?php
        echo('
        <form id="connectionForm" action="/php/signup_action.php" method=POST>
            <input type="text" id="fpseudo" name="fpseudo" placeholder="pseudo"><br/>
            <input type="text" id="fname" name="fname" placeholder="prénom"><br/>
            <input type="text" id="fsurname" name="fsurname" placeholder="nom"><br/>
            <input type="password" id="fpass" name="fpass" placeholder="mot de passe"><br/>
            <input type="password" id="fpassConf" name="fpassConf" placeholder="confirmation"><br/>
            <input type="text" id="fpaypal" name="fpaypal" placeholder="paypal"><br/>
            <input type="text" id="fresidence" name="fresidence" placeholder="adresse"><br/>
            <input type="text" id="fzipcode" name="fzipcode" placeholder="code postal"><br/>
            <input type="text" id="fcity" name="fcity" placeholder="ville"><br/>
            <input type="text" id="fmail" name="fmail" placeholder="email"><br/>
            
            <input type="submit" id="fsubmit" name="submit" value="S\'enregistrer">
        </form>
        <br />
        <p> Déjà inscrit? Cliquez <a href="/login.php">ici</a></p>
    ');
        ?>
    </body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php'); ?>
</html>
