<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/reduction.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/clavier.css">
  </head>
  <body>
    <?php include('Includes/header.php') ?>
    <main>

      <div class="recherche">
          <input id="recherche" type="text" name="recherche" onkeyup="search()"  placeholder="Recherche entreprise">
      </div>
 <script src="./functions.js"></script>
      <div class="ALL" id="ALL">
      <?php

      include('Includes/connexion.php');

      $qq = 'SELECT type, montant, description, partenaire FROM reduction';
      $reqq = $db->prepare($qq);
      $reqq->execute([]);


       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
          echo '<div class="contain">';
          echo '<h4>'. $valueq[3].'</h4>';
            echo '<div class="corps">';
            echo '<img src="export.php?name='. $valueq[3].'" class="rounded-circle">';
            echo '<p class="description">'. $valueq[2] . '</p>';
            echo '<p class="montant">' . $valueq[1] . $valueq[0] . '</p>';
          echo "</div>";
          echo "</div>";
         }
       ?>
   </main>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
