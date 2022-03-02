<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/produit.css">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>

          <div class="cordo">

              include('Includes/connexion.php');


              $qq = 'SELECT id, montant, type, description FROM reduction where id = :id AND partenaire = :partenaire ';
              $reqq = $db->prepare($qq);
              $reqq->execute([
                'id' => $_POST["reduction"],
                'partenaire' => $_POST['partenaire']
              ]);
               $resultsq = $reqq->fetchAll();

               foreach ($resultsq as $key => $valueq) {
                  echo '
                  <form action="update_reduction.php" class="coordonnées" method="POST">
                  <label> Montant :</label>
                  <div class="montant">
                    <input type="number" min="0" name="montant" step=".01" value="'.$valueq[1].'">
                  </div>


                  <label> Type :</label>
                  <div class="name">
                    <select name="type">
                    ';

                    if ($valueq[2]==='%'){
                    echo'<option  selected="selected"  value="%">%</option>
                         <option value="€">€</option>
                        ';
                      }else {
                        echo'<option  selected="selected"  value="€">€</option>
                             <option value="%">%</option>
                            ';
                      }
                      echo '
                    </select>


                  </div>

                  <label> Description :</label>
                  <div class="description">
                    <textarea name="description">'.$valueq[3].'</textarea>
                  </div>
                  <input type="hidden" name="id" value="<?php  echo '.$valueq[0].' ?>">
                 <div class="bouton">
                   <center><input class="envoie" type="submit" value="Ajouté"></center>
                  </div>
            </form>';
                        }

                 ?>
          </div>

          <form action="delete_reduction.php" method="post">
               <p>Si vous voulez supprimer le produit</p>

             <div class="bouton">
               <?php
                echo "<input type='hidden' name='id' value='" .$_POST["reduction"]. "'>";
                echo "<input type='hidden' name='partenaire' value='" .$_POST["partenaire"]. "'>";

                ?>
               <center><input class="envoie" type="submit" value="Suppression de la réduction"></center>
             </div>
           </form>



    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
