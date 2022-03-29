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
					echo "<a class='up' id='parte' href='partenaire.php'>Partenaire</script></a>
								<a class='up' id='pro' href='produits.php'>Produits</a>
								<a class='up' id='red' href='reductions.php'>Reductions</a>
								<a class='up' id='his' href='historique.php'>Historique</a>
								<a class='up' href='achat.php'><img src='Images/achat.png' height=50px></a>
								<a class='up'  id='dec' href='deconnexion.php'>Déconnexion</a>

								<select id='lan' onchange='trad()'>
													<option id='fr' value='1'>France</option>
													<option id='en' value='2'>Anglais</option>
													<option id='es' value='3'>Espagnol</option>
													<option id='all' value='4'>Allemand</option>
									</select>

								";
					echo "<a class='up' id='prof' href='profil_client.php'>Profil</a>";

				}
			 if($_SESSION['status'] == 'Admin') {
				 echo "<a class='up'  id='parte' href='check_partenaire.php'>Partenaire</a>";
						echo "<a class='up' id='cat' href='catalogue.php'>Catalogue</a>";
						echo "<a class='up' id='util' href='users.php'>Utilisateurs</a>";
						echo "<a class='up' id='ent' href='entreprise.php'>Entreprises</a>";
						echo "<a class='up' id='pot' href='entrepot.php'>Entrepot</a>

						<select id='lan' onchange='trad()'>
											<option id='fr' value='1'>France</option>
											<option id='en' value='2'>Anglais</option>
											<option id='es' value='3'>Espagnol</option>
											<option id='all' value='4'>Allemand</option>
							</select>

						";
						echo "<a class='up' href='deconnexion.php'>Déconnexion</a>";
					}
			 	if($_SESSION['status'] == 'Entreprise') {
					echo "<a class='up' id='parte'  href='partenaire.php'>Partenaire</a>";
					echo "<a class='up'  id='util' href='userList.php'>Utilisateurs</a>";
						echo "<a class='up'  id='dec' href='deconnexion.php'>Déconnexion</a>

						<select id='lan' onchange='trad()'>
											<option id='fr' value='1'>France</option>
											<option id='en' value='2'>Anglais</option>
											<option id='es' value='3'>Espagnol</option>
											<option id='all' value='4'>Allemand</option>
							</select>


						";
						echo "<a class='up' id='prof' href='profil_entreprise.php'>Profil</a>";

					}
				}
				else {
					echo "<a class='up' id='parte' href='partenaire.php'>Partenaire</script></a>";
					echo "
						<select id='lan' onchange='trad()'>
											<option id='fr' value='1'>Français</option>
											<option id='en' value='2'>Anglais</option>
											<option id='es' value='3'>Espagnol</option>
											<option id='all' value='4'>Allemand</option>
							</select>
								";
						echo "<a class='up' id='demande' href='demande.php'>Demande</script></a>";

						echo "<a class='up' id='con' href='connexion.php'>Connexion</a>";
							}
			?>

			</div>
		</ul>
		<script src="trad.js"></script>
	</nav>

</header>
