<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/partenaire.css">
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

      $qq = 'SELECT name FROM partenaire';
      $reqq = $db->prepare($qq);
      $reqq->execute([]);


       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
          echo '<div class="contain">';
            echo '<img src="export.php?name='. $valueq[0].'" class="rounded-circle">';
          echo "</div>";

         }
       ?>
     </div>
   </main>
 </center>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
