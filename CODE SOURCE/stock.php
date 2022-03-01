<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/produits.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/clavier.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </head>
  <body>
    <?php include('Includes/header.php') ?>
    <main>




      <div class="ALL" id="ALL">

        <form action='add_produit.php' method='POST'>
          <input type='hidden' name='entrepot' value='<?php echo $_POST['entrepot'];?>'>
         <input class='remove' type='submit' value='Ajouter un produit'>
       </form>
      <?php

      include('Includes/connexion.php');
      include('Includes/result.php');

      $entrepot = $_POST['entrepot'];
      $qq = 'SELECT name, price, description, quantite FROM produits WHERE entrepot=?';
      $reqq = $db->prepare($qq);
      $reqq->execute([$entrepot]);



       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
         echo "<form class='contain' action='produit.php' method='post'>";
          echo "<button type='submit'>";
              echo '<input type="hidden" name="produit" value="' . $valueq[0] . '">';
              echo "<input type='hidden' name='entrepot' value='" . $entrepot . "'>";
              echo '<h4>'. $valueq[0].'</h4>';
              echo '<div class="corps">';
              echo '<img src="export.php?name='. $valueq[0].'" class="rounded-circle">';
              echo '<p class="description">' .$valueq[2] .'</p>';
              echo '<p class="description">Il en reste ' . $valueq[3] . '</p>';
              echo '<p class="montant">' . $valueq[1] . '€</p>';
          echo "</button>";
         echo "</form>";
         }
       ?>
       </div>
   </main>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
