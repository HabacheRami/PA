<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/header.css">
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js">
  </script>

  <style>
    .camembert{
      width: 80%;
      margin: auto;
    }
    .courbe{
      width: 80%;
      margin: auto;
    }
  </style>

</head>
<body>

  <?php
  include('Includes/header.php');
  ?>
  <div class="camembert">
  <canvas id="graph2"></canvas>
  </div>
  <div class="courbe">
  <canvas id="graph1"></canvas>
  </div>

  <div class="line">
  <canvas id="graph3"></canvas>
  </div>



  <?php
      include('Includes/connexion.php');


      $q = 'SELECT entrepot, count(name) FROM produits GROUP BY entrepot';
      $req = $db->prepare($q);
      $req->execute();
      $resultat = $req->fetchAll();

      foreach ($resultat as $key => $value) {
        echo '<input type="hidden" id="entrepot' . $value[0] . '" value="' . $value[1] . '">';
      }

      $q = 'SELECT categorie, SUM(quantite) FROM produits GROUP BY categorie';
      $req = $db->prepare($q);
      $req->execute();
      $resultat = $req->fetchAll();

      foreach ($resultat as $key => $value) {
        echo '<input type="hidden" id="' . $value[0] . '" value="' . $value[1] . '">';
      }

      $a = 'SELECT status, COUNT(status) FROM user WHERE status!="Admin" group by status';
      $req = $db->prepare($a);
      $req->execute();
      $resultat = $req->fetchAll();

      foreach ($resultat as $key => $value) {
        echo '<input type="hidden" id="' . $value[0] . '" value="' . $value[1] . '">';
      }


  ?>

  <script src="graph.js"></script>
  <script src="graph2.js"></script>
  <script src="graph3.js"></script>

</body
</html>
