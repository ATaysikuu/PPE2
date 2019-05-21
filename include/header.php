<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
	if(isset($_SESSION['id'])){

		switch(UserRole($_SESSION['id'])){
			case "0": //ADMIN HEADER
				echo(' 
					<div class="container" id="header">
							<div class="logo">
								<a href="/"><img src="/images/sell_it_logo2.png"></a>
							</div>
							<div id="menu">
								<h2>MENU</h2>
								<a href="/admin/index.php">Admin</a> - 
								<a href="/admin/formationlist.php">Formations</a> - 
								<a href="/admin/clientlist.php">Clients</a> - 
								<a href="/admin/prolist.php">Pros</a> - 
								<a href="/contact.php">Contact</a> - 
								<a href="/php/logout.php">Déconnexion ('.$_SESSION['pseudo'].')</a>
							</div>
						</div>
					</div>
				');
				break;
			case "1": //PRO HEADER
				echo('
				<div class="container" id="header">
						<div class="logo">
							<a href="/"><img src="/images/sell_it_logo2.png"></a>
						</div>
						<div id="menu">
							<h2>MENU</h2>
							<a href="/formationlist.php">Toutes les Formations</a> - 
							<a href="/pro/addmodify.php">Ajouter une Formations</a> - 
							<a href="/pro/formationlist.php">Mes Formations mises en ligne</a> - 
							<a href="/contact.php">Contact</a> - 
							<a href="/php/logout.php">Déconnexion ('.$_SESSION['pseudo'].')</a>
						</div>
					</div>
				</div>
				');
				break;
			case "2": //CLIENT HEADDER
				$basketSize=GetBasketSize($_SESSION['id']);
				echo('
				<div class="container" id="header">
						<div class="logo">
							<a href="/"><img src="/images/sell_it_logo2.png"></a>
						</div>
						<div id="menu">
							<h2>MENU</h2>
							<a href="/client/formationsclient.php">Mes Formations</a> - 
							<a href="/formationlist.php">Toutes les Formations</a> - 
							<a href="/basket.php" id="compteurpanier">Panier (');echo($basketSize[0]);echo(')</a> - 
							<a href="/contact.php">Contact</a> - 
							<a href="/php/logout.php">Déconnexion ('.$_SESSION['pseudo'].')</a>
						</div>
					</div>
				</div>
				');
				break;
		}
	}
	else{ //DEFAULT HEADDER
		echo('
			<div class="container" id="header">
					<div class="logo">
						<a href="/"><img src="/images/sell_it_logo2.png"></a>
					</div>
					<div id="menu">
						<h2>MENU</h2>
						<a href="/signup.php">S\'inscrire</a>
						<a href="/login.php">Se connecter</a>
						<a href="/formationlist.php">Formations</a>
						<a href="/contact.php">Contact</a>
					</div>
				</div>
			</div>
		');
	}
	
?>
<title><?php if (isset ($title)) { echo $title ;} else {echo 'Mon site';} ?></title>