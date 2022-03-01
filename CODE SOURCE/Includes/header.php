<?php

if(!isset($_SESSION['email'])){
	session_start();
}

 ?>

<header>
	<nav>
		<ul class="containe">

			<div class="left">
			<a href="index.php"><img src="Images/logo_LoyaltyCard.png" style="height:140px"></a>
			</div>

			<div class="right">

			<?php
			if(isset($_SESSION['email'])){
				if($_SESSION['status'] == 'Client') {
					echo "<a class='up' href='partenaire.php'>Partenaire</a>
								<a class='up' href='produits.php'>Produits</a>
								<a class='up' href='reductions.php'>Reductions</a>
								<a class='up' href='historique.php'>Historique</a>
								<a class='up' href='achat.php'><img src='Images/achat.png' height=50px></a>
								<div id='google_translate_element'></div>
								<a class='up' href='deconnexion.php'>Déconnexion</a>";
					echo "<a class='up' href='profil_client.php'>Profil</a>";

				}
			 if($_SESSION['status'] == 'Admin') {
				 echo "<a class='up' href='check_partenaire.php'>Partenaire</a>";
						echo "<a class='up' href='catalogue.php'>Catalogue</a>";
						echo "<a class='up' href='users.php'>Utilisateurs</a>";
						echo "<a class='up' href='entreprise.php'>Entreprises</a>";
						echo "<a class='up' href='entrepot.php'>Entrepot</a>
						<div id='google_translate_element'></div>";
						echo "<a class='up' href='deconnexion.php'>Déconnexion</a>";
					}
			 	if($_SESSION['status'] == 'Entreprise') {
					echo "<a class='up' href='partenaire.php'>Partenaire</a>";
					echo "<a class='up' href='userList.php'>Utilisateurs</a>
					<div id='google_translate_element'></div>";
						echo "<a class='up' href='deconnexion.php'>Déconnexion</a>";
						echo "<a class='up' href='profil_entreprise.php'>Profil</a>";

					}
				}
				else {
					echo "<a class='up' href='partenaire.php'>Partenaire</a>
					<div id='google_translate_element'></div>";
						echo "<a class='up' href='connexion.php'>Connexion</a>";
							}
			?>

			<script type='text/javascript' src='./trad.js'></script>
			<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>

			</div>
		</ul>
	</nav>

</header>
