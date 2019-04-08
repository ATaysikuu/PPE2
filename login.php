<?php session_start() ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php'); ?>
    <form id="connectionForm" action="/php/login_action.php" method=POST>
        <input type="text" id="fid" name="pseudo" placeholder="pseudo">
        <input type="password" id="fpass" name="pass" placeholder="pass">
        <input type="submit" id="fsubmit" name="submit" value="Connection">
    </form>
    <br />
    <p> Pas encore inscrit? Cliquez <a href="/signup.php">ici</a></p>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php'); ?>