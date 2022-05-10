<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Novation</title>
  <link rel="stylesheet" href="CSS/catalogue.css">
  <link rel="stylesheet" href="CSS/header.css">
  <link rel="stylesheet" href="CSS/footer.css">
  <link rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
</head>

<body>
  <!-- Barre de navigation -->
<?php

include('includes/header.php');

?>
  <!-- Fin de la barre de navigation -->

  <!-- Section -->
  <section>
    <h1 id='titre'>Notre catalogue pour satisfaire vos plasirs.</h1>
  </section>
  <!-- Fin du Section -->

  <!-- Section principale -->
  <section class="main">

    <!-- Toutes les cartes -->

    <div class="cards">
      <?php

      include('Includes/connexion.php');

        $q = 'SELECT name, description, price FROM produits';
        $req = $db->prepare($q);
        $req->execute();
        $resultat = $req->fetchAll();

        $a = "€";

        foreach ($resultat as $key => $value) {
          echo '<div class="card">';
            echo '<img src="export.php?name='. $value[0].'" >';
              echo '<div class="card-header">';
                echo '<h4 class="title">' . $value[0] . '</h4>';
                echo '<h4 class="price">' . $value[2] . $a .'</h4>';
              echo '</div>';
              echo '<div class="card-body">';
                echo '<p>' . $value[1] . '</p>';
                echo '</div>';
          echo '</div>';
        }


        $q = 'SELECT partenaire, description, montant, type FROM reduction';
        $req = $db->prepare($q);
        $req->execute();
        $resultat = $req->fetchAll();

        $a = "€";

        foreach ($resultat as $key => $value) {
          echo '<div class="card">';
            echo '<img src="export.php?name='. $value[0].'" >';
              echo '<div class="card-header">';
                echo '<h4 class="title">' . $value[0] . '</h4>';
                echo '<h4 class="price">' . $value[2] . $value[3] .'</h4>';
              echo '</div>';
              echo '<div class="card-body">';
                echo '<p>' . $value[1] . '</p>';
                echo '</div>';
          echo '</div>';
        }

        ?>

    </div>
    <!-- Fin de toutes les cartes -->

  </section>
  <!-- Fin de la section principale -->

<?php
  include('Includes/footer.php')
?>

</body>

</html>
