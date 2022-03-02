<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/footer.css">
   <link rel="stylesheet" href="CSS/foot.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/entreprise.css">
  </head>
  <body>
    <?php include('Includes/header.php');?>
    <main>

              <form action='add_entreprise.php'>
               <input class='remove' type='submit' value='Retour aux entreprises'>
              </form>

              <div class="ALL">

                <h4>Lien a envoyer au DG de l'entreprise ou a celui qui s'occupe du compte de l'entreprise</h4>
                <?php

                $link ="http://localhost:8888/LoyaltyCard/CODE%20SOURCE/inscription_entreprise.php?entreprise=".$_GET['entreprise']."&id=".$_GET['id']."";


                echo $link;
                 ?>


              </div>

    </main>
  <?php include('Includes/footer.php'); ?>
  </body>
</html>
