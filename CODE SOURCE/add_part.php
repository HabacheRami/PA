<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/footer.css">
   <link rel="stylesheet" href="CSS/foot.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/profil.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>


    <h2>Ajout d'un partenaire</h2>

            <?php  include('Includes/result.php'); ?>


            <form action="verif_part.php" class="coordonnées" method="POST" enctype="multipart/form-data">
                <label> Nom :</label>
                <div class="name">
                  <input type="text" name="nom" placeholder="Nom">
                </div>

                <div class="picture">
                  <label>Votre image</label>
    						  <input type="file" name="image">
                </div>

               <div class="bouton">
                 <center><input class="envoie" type="submit" value="Ajouté"></center>
                </div>
          </form>


    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
