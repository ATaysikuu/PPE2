<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Page admin liste formation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<body>
	
	<div class="container bodycontent">
		<div class="wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form id="connectionForm" action="/php/login_action.php" method=POST>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fid">Pseudo: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fid" name="pseudo" placeholder="pseudo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fpass">Pass: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" id="fpass" name="pass" placeholder="pass"><br/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="submit" id="fsubmit" name="submit" value="Connexion" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <form id="signupform" action="/php/signup_action.php" method=POST>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fpseudo">Pseudo:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fpseudo" name="fpseudo" placeholder="pseudo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fpass">Mot de passe: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" id="fpass" name="fpass" placeholder="mot de passe">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fpassConf">Confirmation: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" id="fpassConf" name="fpassConf" placeholder="confirmation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fmail">Email: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fmail" name="fmail" placeholder="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fpaypal">Paypal: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fpaypal" name="fpaypal" placeholder="paypal">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Prénom: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fname" name="fname" placeholder="prénom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fsurname">Nom: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fsurname" name="fsurname" placeholder="nom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fresidence">Adresse: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fresidence" name="fresidence" placeholder="adresse">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fzipcode">Code postal: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fzipcode" name="fzipcode" placeholder="code postal">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fcity">Ville: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="fcity" name="fcity" placeholder="ville">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="fpro">Je souhaite proposer des formations: </label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" id="fpro" name="fpro" placeholder="pro">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" id="fsubmit" name="submit" value="S'enregistrer" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php'); ?>