<?php session_start() ?>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/profil.css">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>


    <?php echo "<h2>Bienvenue, " . $_SESSION['name'] . "</h2>";?>


          <div class="cordo">
            <h3>Vos coordonnées :</h3>

            <?php
              include('Includes/connexion.php');

              $qq = 'SELECT name, phone, country, addresse, codepostale FROM user WHERE name =:name';
              $reqq = $db->prepare($qq);
              $reqq->execute([
                'name' => $_SESSION['name']
              ]);
               $resultsq = $reqq->fetchAll();

               foreach ($resultsq as $key => $valueq) {
                  echo ' <form action="update_entreprise.php" class="coordonnées" method="POST">
                     <label> Nom :</label>
                     <div class="name">
                       <input type="text" name="name" value="'. $valueq[0].'">
                     </div>


                     <label>Téléphone :</label>
                     <br>
                     <div class="number">
                       <input class="number" name="phone" type="tel" max="10" "pattern="[0,9]" value="'. $valueq[1].'">
                     </div>

                     <label>Ville :</label>
                     <br>
                     <div class="country">
                       <input type="text" name="country" value="'. $valueq[2].'">
                     </div>

                     <label>Adresse :</label>
                     <br>
                     <div class="street">
                       <input type="text" name="addresse" value="'. $valueq[3].'">
                     </div>

                     <label>Code Postale :</label>
                     <br>
                     <div class="codepostal">
                       <input type="number" name="codepostale" min="0" max="99999" value="'. $valueq[4].'">
                     </div>';

                   }


                     $q = 'SELECT CA FROM entreprise  WHERE name =:name';
                     $req = $db->prepare($q);
                     $req->execute([
                       'name' => $_SESSION['name']
                     ]);
                     $resultsq = $req->fetchAll();

                      foreach ($resultsq as $key => $valueq) {

                        echo '
                        <label>CA :</label>
                        <br>
                        <div class="number">
                          <input class="CA" name="CA" min="0" type="number" value="'. $valueq[0].'">
                        </div>

                        <label>Mot de passe :</label>
                        <br>
                        <div class="password">
                          <input type="password" name="password" placeholder="  Votre mot de passe">
                        </div>

                        <label>Vérifiez le mot de passe : </label>
                        <br>
                        <div class="passwordcheck">
                          <input type="password" name="passwordcheck" placeholder=" Confirmation mot de passe">
                        </div>

                        <div class="bouton">
                          <center><input class="envoie" type="submit" value="Modifié"></center>
                        </div>
                     </form>';
                   }

                 ?>
          </div>


             <form action="delete_entreprise.php" method="post">
               <p>Si vous voulez supprimer votre compte cliquez sur supprimer</p>

             <div class="bouton">
               <?php
                echo "<input type='hidden' name='name' value='" .$_SESSION["name"]. "'>";
                ?>
               <center><input class="envoie" type="submit" value="Suppression du compte"></center>
             </div>
           </form>



    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
