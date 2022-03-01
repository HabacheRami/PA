<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/produit.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>


    <?php echo "<h2> " . $_POST['produit'] . "</h2>";?>


          <div class="cordo">
            <?php  include('Includes/result.php');

              include('Includes/connexion.php');

              $qq = 'SELECT name, description, price, quantite FROM produits where name = :name';
              $reqq = $db->prepare($qq);
              $reqq->execute([
                'name' => $_POST['produit']
              ]);
               $resultsq = $reqq->fetchAll();

               foreach ($resultsq as $key => $valueq) {
                  echo ' <form action="update_produit.php" class="coordonnées" method="POST">
                             <label> Description :</label>
                             <br>
                             <div class="description">
                             <textarea name="description">'. $valueq[1].'</textarea>
                             </div>

                             <label> Prix :</label>
                             <br>
                             <div class="prix">
                             <input name="prix" type="number" min="0" value="'.$valueq[2].'">
                             </div>

                             <label> Quantité :</label>
                             <br>
                             <div class="quantite">
                             <input name="quantite" type="number" min="0" value="'.$valueq[3].'">
                             </div>';

                             echo '<input type="hidden" name="produit" value="' .$_POST["produit"]. '">';
                             echo '<input type="hidden" name="entrepot" value="' .$_POST["entrepot"]. '">

                             <div class="bouton">
                               <center><input class="envoie" type="submit" value="Modifié"></center>
                             </div>
                          </form>';
                        }

                 ?>
          </div>

          <form action="delete_produit.php" method="post">
               <p>Si vous voulez supprimer le produit</p>

             <div class="bouton">
               <?php
                echo "<input type='hidden' name='produit' value='" .$_POST["produit"]. "'>";
                echo "<input type='hidden' name='entrepot' value='" .$_POST["entrepot"]. "'>";

                ?>
               <center><input class="envoie" type="submit" value="Suppression du produit"></center>
             </div>
           </form>



    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
