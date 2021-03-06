<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/reduction.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
  </head>
  <body>
    <?php include('Includes/header.php') ?>
    <main>

      <div class="recherche">
          <input id="recherche" type="text" name="recherche" onkeyup="search()"  placeholder="Recherche entreprise">
      </div>
 <script src="./functions.js"></script>
 <?php  echo '<center><h3>'. $_SESSION['name'].'</h3></center>'; ?>

        <form class="corps" action='add_red.php' method='POST'>
         <input class='remove' type='submit' value='Ajouter des reductions'>
       </form>
<div class="ALL">

      <?php
      include('Includes/connexion.php');

      $qq = 'SELECT id, type, montant, description FROM reduction WHERE partenaire =:partenaire';
      $reqq = $db->prepare($qq);
      $reqq->execute([
        'partenaire' => $_SESSION['name']
      ]);


       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
         echo '<div class="contain">';
          echo "<form class='contain' action='reduction.php' method='post'>";
          echo "<input type='hidden' name='reduction' value='" . $valueq[0] . "'>";
          echo "<input type='hidden' name='partenaire' value='" . $_SESSION['name'] . "'>";
            echo "<button type='submit'>";
                echo '<div class="corps">';
                  echo '<p class="description">'. $valueq[3] . '</p>';
                  echo '<p class="montant">' . $valueq[2] . $valueq[1] . '</p>';
                echo "</div>";
            echo "</button>";
          echo "</form>";
        echo "</div>";
         }
       ?>

   </main>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
