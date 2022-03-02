<?php session_start() ?>
<!DOCTYPE html>
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


    <h2>Ajout d'un produit</h2>



            <form action="verif_prod.php" class="coordonnées" method="POST" enctype="multipart/form-data">
                <label> Nom :</label>
                <div class="name">
                  <input type="text" name="name" placeholder="écran Samsung RRJR38RJ3">
                </div>

                <label> Prix :</label>
                <div class="price">
                  <input type="number" name="price" min="0" step=".01" placeholder="30">
                </div>

                <label> Description :</label>
                <div class="description">
                  <textarea name="description" placeholder="Ecran Samsung 120 pouces, noir"></textarea>
                </div>

                <label> Quantité :</label>
                <div class="quantite">
                  <input type="number" min="1" name="quantite" placeholder="40">
                </div>

                <div class="picture">
                  <label>Votre image</label>
    						  <input type="file" name="image">
                </div>

                <input type='hidden' name='entrepot' value='<?php echo $_POST['entrepot'];?>'>


               <div class="bouton">
                 <center><input class="envoie" type="submit" value="Ajouté"></center>
                </div>
          </form>


    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
