<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/foot.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>Melimedic - Profil</title>
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


    <h2>Ajout d'une réduction</h2>

            <?php  include('Includes/result.php'); ?>


            <form action="verif_red.php" class="coordonnées" method="POST" enctype="multipart/form-data">
                <label> Montant :</label>
                <div class="montant">
                  <input type="number" min="0" name="montant" placeholder="23">
                </div>

                <label> Type :</label>
                <div class="name">
                  <select name="type">
                      <option>--Type de Réduction--</option>
                      <option value="%">%</option>
                      <option value="€">€</option>
                  </select>
                </div>

                <label> Description :</label>
                <div class="description">
                  <textarea name="description" rows="5" cols="33" placeholder="Description"></textarea>
                </div>
                <input type='hidden' name='partenaire' value='<?php  echo $_POST["partenaire"] ?>'>
               <div class="bouton">
                 <center><input class="envoie" type="submit" value="Ajouté"></center>
                </div>
          </form>


    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
