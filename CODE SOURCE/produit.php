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


    <?php echo "<h2> " . $_POST['produit'] . "</h2>";?>


          <div class="cordo">
            <?php

              include('Includes/connexion.php');

              $qq = 'SELECT name, description, price, quantite, categorie FROM produits where name = :name';
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
                             <input name="prix" type="number" min="0" step=".01" value="'.$valueq[2].'">
                             </div>

                             <label> Quantité :</label>
                             <br>
                             <div class="quantite">
                             <input name="quantite" type="number" min="0" value="'.$valueq[3].'">
                             </div>';

                             echo '<input type="hidden" name="produit" value="' .$_POST["produit"]. '">';
                             echo '<input type="hidden" name="entrepot" value="' .$_POST["entrepot"]. '">';

                             if($valueq[4] == "Alimentaire"){

                               echo '<select name="categorie">
                                         <option value="Alimentaire" selected>Alimentaire</option>
                                         <option value="Electronique">Electronique</option>
                                         <option value="Electronique">Electromenager</option>
                                         <option value="Divertissement">Divertissement</option>
                                         <option value="Autre">Autre</option>
                                 </select>';
                             }
                             if($valueq[4] == "Electronique"){

                               echo '<select name="categorie">
                                         <option value="Alimentaire" >Alimentaire</option>
                                         <option value="Electronique" selected>Electronique</option>
                                         <option value="Electronique">Electronique</option>
                                         <option value="Divertissement">Divertissement</option>
                                         <option value="Autre">Autre</option>
                                 </select>';
                             }
                             if($valueq[4] == "Electromenager"){

                              echo ' <select name="categorie">
                                         <option value="Alimentaire" >Alimentaire</option>
                                         <option value="Electronique" >Electronique</option>
                                         <option value="Electronique" selected>Electromenager</option>
                                         <option value="Divertissement">Divertissement</option>
                                         <option value="Autre">Autre</option>
                                 </select>';
                             }
                             if($valueq[4] == "Divertissement"){

                              echo ' <select name="categorie">
                                         <option value="Alimentaire" >Alimentaire</option>
                                         <option value="Electronique" >Electronique</option>
                                         <option value="Electronique" >Electromenager</option>
                                         <option value="Divertissement" selected>Divertissement</option>
                                         <option value="Autre">Autre</option>
                                 </select>';
                             }
                             if($valueq[4] == "Autre"){

                              echo ' <select name="categorie">
                                         <option value="Alimentaire" >Alimentaire</option>
                                         <option value="Electronique" >Electronique</option>
                                         <option value="Electronique" >Electromenager</option>
                                         <option value="Divertissement" >Divertissement</option>
                                         <option value="Autre" selected>Autre</option>
                                 </select>';
                             }

                            echo '
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
               echo '<input type="hidden" name="produit" value="' .$_POST["produit"]. '">';
               echo '<input type="hidden" name="entrepot" value="' .$_POST["entrepot"]. '">';

                ?>
               <center><input class="envoie" type="submit" value="Suppression du produit"></center>
             </div>
           </form>



    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
