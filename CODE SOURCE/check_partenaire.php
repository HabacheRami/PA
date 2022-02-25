<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/check_part.css">
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

      <div class="recherche">
          <input id="recherche" type="text" name="recherche" onkeyup="search()"  placeholder="Recherche entreprise">
      </div>
      <script src="./functions.js"></script>

      <form action='add_part.php' method='POST'>
       <input class='remove' type='submit' value='Ajouter des partenaires'>
     </form>

     <?php
     include('Includes/result.php');?>

      <div class="ALL" id="ALL">
      <?php
      include('Includes/connexion.php');

      $qq = 'SELECT name FROM partenaire';
      $reqq = $db->prepare($qq);
      $reqq->execute([]);


       $resultsq = $reqq->fetchAll();

       foreach ($resultsq as $key => $valueq) {
          echo '<div class="contain">
          <form action="reduction_admin.php" method="post">
            <button type="submit">';
              echo '<img src="export.php?name='. $valueq[0].'" class="rounded-circle">
              <input type="hidden" name="partenaire" value="' .$valueq[0]. '">
              </button>
              </form>';
            echo "<form action='delete_part.php' method='POST'>";
            echo "<input type='hidden' name='name' value='" .$valueq[0]. "'>";
            echo "<input class='remove' type='submit' value='Supprimer'>";
            echo "</form>";
          echo "</div>";

         }
       ?>
     </div>

   </main>

    <?php include('Includes/footer.php') ?>
  </body>
</html>
