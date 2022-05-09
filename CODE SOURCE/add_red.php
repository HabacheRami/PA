<?php session_start();


if ( $_SESSION['status'] == 'Partenaire' ){
  $_POST["partenaire"] = $_SESSION['name'];
}


?>
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


    <h2>Ajout d'une réduction</h2>


<div class="coordonnées">


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
</div>

    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
