<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/produit.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
  </head>
  <body>
    <?php include('Includes/header.php');
			include('Includes/result.php');
			
			?>

      <div class="title">
        <h2>Partenaire en attente :</h2>
      </div>

      <div>
      <?php
                    $qq = 'SELECT name, siret, email FROM demande where CA IS NULL';
                    $reqq = $db->prepare($qq);
                    $reqq->execute([]);
                     $resultsq = $reqq->fetchAll();

                     foreach ($resultsq as $key => $valueq) {
                        echo ' <form action="verif.php" class="coordonnées" method="POST">
                                  <label> Name :</label>
                                   <div class="name">
                                   <input name="name" type="text" " value="'.$valueq[0].'" readonly>
                                   </div>
																	 <label> SIRET :</label>
																	 <div class="siret">
                                   <input name="siret" type="text" " value="'.$valueq[1].'" readonly>
                                   </div>
                                   <div class="type">
                                   <input name="type" type="hidden" value="partenaire" readonly>
                                   </div>
																	 <div class="type">
                                   <input name="email" type="hidden" value="'.$valueq[2].'" readonly>
                                   </div>

                                   <div class="bouton">
                                     <input class="envoie" type="submit" name="supp" value="Supprime">
                                     <input class="envoie" type="submit" name="val" value="Valide">
                                   </div>
                                </form>';
                              }

                       ?>
                </div>

        <div class="title">
          <h2>Entreprise en attente :</h2>
        </div>
        <div>
        <?php
                      $qq = 'SELECT name, siret, email FROM demande where CA IS NOT NULL';
                      $reqq = $db->prepare($qq);
                      $reqq->execute([]);
                       $resultsq = $reqq->fetchAll();

                       foreach ($resultsq as $key => $valueq) {
                          echo ' <form action="verif.php" class="coordonnées" method="POST">
																		<label> Name :</label>
																		 <div class="name">
																		 <input name="name" type="text" " value="'.$valueq[0].'" readonly>
																		 </div>
																		 <label> SIRET :</label>
																		 <div class="siret">
																		 <input name="siret" type="text" " value="'.$valueq[1].'" readonly>
																		 </div>
																		 <div class="type">
																		 <input name="type" type="hidden" value="partenaire" readonly>
																		 </div>
																		 <div class="type">
																		 <input name="email" type="hidden" value="'.$valueq[2].'" readonly>
																		 </div>

																		 <div class="bouton">
																			 <input class="envoie" type="submit" name="supp" value="Supprime">
																			 <input class="envoie" type="submit" name="val" value="Valide">
																		 </div>
																	</form>';
                                }

                         ?>
                  </div>

      </div>
  <?php include('Includes/footer.php');?>
  </body>
</html>
