<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/entrepot.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
  </head>
  <body>
    <?php include('Includes/header.php') ?>
    <main>




      <div class="ALL" id="ALL">
      <?php

      include('Includes/connexion.php');
      include('Includes/result.php');

      $qq = 'SELECT id, address, country, codepostale FROM entrepot';
      $reqq = $db->prepare($qq);
      $reqq->execute([]);




       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
         echo "<form class='contain' action='stock.php' method='post'>";
          echo "<button type='submit'>";
              echo "<input type='hidden' name='entrepot' value='" . $valueq[0] . "'>";
              echo '<h4>Entrepot'. $valueq[0].'</h4>';
              echo '<div class="corps">';
              echo '<img src="export.php?name=entrepot'. $valueq[0].'" class="rounded-circle">';
              echo '<p class="description">' . $valueq[1] . $valueq[2] . $valueq[3] . '</p>';
          echo "</button>";
         echo "</form>";
         }
       ?>
       </div>
   </main>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
