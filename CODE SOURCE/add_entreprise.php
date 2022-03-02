<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/foot.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/profil.css">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>


    <h2>Ajout d'une entreprise</h2>


            <form action="link_entreprise.php" class="coordonnées" method="POST">
                <label> Nom :</label>
                <div class="name">
                  <input type="text" name="name" placeholder="Nom">
                </div>

               <div class="bouton">
                 <center><input class="envoie" type="submit" value="Ajouté"></center>
                </div>
          </form>


    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
