<?php session_start();?>

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


    <?php echo "<h2>Bienvenue, " . $_SESSION['firstname'] . "</h2>";?>


          <div class="cordo">
            <h3>Vos coordonnées :</h3>

            <?php
              include('Includes/connexion.php');

              $qq = 'SELECT name, firstname, phone, country, addresse, codepostale FROM user where email = :email';
              $reqq = $db->prepare($qq);
              $reqq->execute([
                'email' => $_SESSION['email']
              ]);
               $resultsq = $reqq->fetchAll();

               foreach ($resultsq as $key => $valueq) {
                  echo ' <form action="update.php" class="coordonnees" method="POST">
                     <label> Nom :</label>
                     <div class="name">
                       <input type="text" name="name" value="'. $valueq[0].'">
                     </div>


                     <label> Prénom :</label>
                     <br>
                     <div class="firstname">
                       <input type="text" name="firstname" value="'. $valueq[1].'">
                     </div>

                     <label>Téléphone :</label>
                     <br>
                     <div class="number">
                       <input class="number" name="phone" type="tel" min="0" max="9999999999" "pattern="[0,9]" value="'. $valueq[2].'">
                     </div>

                     <label>Ville :</label>
                     <br>
                     <div class="country">
                       <input type="text" name="country" value="'. $valueq[3].'">
                     </div>

                     <label>Adresse :</label>
                     <br>
                     <div class="street">
                       <input type="text" name="addresse" value="'. $valueq[4].'">
                     </div>

                     <label>Code Postale :</label>
                     <br>
                     <div class="codepostal">
                       <input type="text" name="codepostale" min="0" value="'. $valueq[5].'">
                     </div>

                     <label>Mot de Passe :</label>
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

                 ?>
          </div>

          <div class="card">
            <?php
            include('Includes/connexion.php');


             $q = 'SELECT card, barcode, points FROM loyalty where user = :user';
             $req = $db->prepare($q);
             $req->execute([
               'user' => $_SESSION['email']
             ]);
              $results = $req->fetchAll();
              foreach ($results as $key => $value) {
                echo "<p id='number'>N° carte : ".$value[0]."</p>";
                $barcode = $value[1];
              }


              echo "<input type='hidden' id='code' value='".$barcode."'>";
             ?>

          
                 <div id="barcode" name='barcode'>

                 </div>


             <script src="barcode.js" charset="utf-8"></script>

         </div>

          <div class="convert">
            <p class="convert">Convertion des points en €</p>

            <?php

            echo $value[2] . "pts => " . $value[2]*0.2."€";
          }

             ?>
          </div>

             <form action="delete.php" method="post">
               <p>Si vous voulez supprimer votre compte cliquez sur supprimer</p>

             <div class="bouton">
               <?php
                echo "<input type='hidden' name='email' value='" .$_SESSION["email"]. "'>";
                ?>
               <center><input class="envoie" type="submit" value="Suppression du compte"></center>
             </div>
           </form>



    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
