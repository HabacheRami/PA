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
      include('Includes/result.php');?>

      <div class="title">
        <h2>Partenaire en attente :</h2>
      </div>

      <div>
      <?php
                    $qq = 'SELECT name FROM demande where CA IS NULL';
                    $reqq = $db->prepare($qq);
                    $reqq->execute([]);
                     $resultsq = $reqq->fetchAll();

                     foreach ($resultsq as $key => $valueq) {
                        echo ' <form action="verif.php" class="coordonnées" method="POST">
                                  <label> Name :</label>
                                   <br>
                                   <div class="name">
                                   <input name="name" type="text" " value="'.$valueq[0].'" readonly>
                                   </div>
                                   <div class="type">
                                   <input name="type" type="hidden" value="partenaire" readonly>
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
                      $qq = 'SELECT * FROM demande where CA IS NOT NULL';
                      $reqq = $db->prepare($qq);
                      $reqq->execute([]);
                       $resultsq = $reqq->fetchAll();

                       foreach ($resultsq as $key => $valueq) {
                          echo " <form action='verif.php' class='coordonnées' method='POST'>
                          <div class='type'>
                          <input name='type' type='hidden' value='entreprise' readonly>
                          <input name='password' type='hidden'  value='".$valueq[3]."' readonly >
                                  <label> Nom :</label><div class='name'><input type='text' name='name' value='".$valueq[0]."' required='required' readonly></div><label> Email :</label><div class='email'><input type='email' name='email' value='".$valueq[2]."' required readonly ></div><label>Téléphone :</label><br><div class='number'><input class='number' name='phone' type='number' max='9999999999' value='".$valueq[4]."' required readonly></div><label>Ville :</label><br><div class='country'><input type='text' name='country'value='".$valueq[1]."' required readonly></div><label>Adresse :</label><br><div class='street'><input type='text' name='addresse' value='".$valueq[5]."' required readonly></div><label>Code Postale :</label><br><div class='codepostale'><input type='number' name='codepostale' min='0' max='99999' value='".$valueq[6]."' required readonly></div><label>CA :</label><br><div class='number'><input class='CA' name='CA' type='number' min='0' value='".$valueq[7]."' required readonly></div>
                                  <div class='bouton'>
                                    <input class='envoie' type='submit' name='supp' value='Supprime'>
                                    <input class='envoie' type='submit' name='val' value='Valide'>
                                  </div>
                                  </form>";
                                }

                         ?>
                  </div>

      </div>
  <?php include('Includes/footer.php');?>
  </body>
</html>
