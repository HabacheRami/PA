<!DOCTYPE html>
<?php session_start() ?>
<html>
<head>

    <meta charset="utf-8">
    <title>Liste Utilisateur</title>
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/userList.css">

</head>
  <body>
          <?php include('Includes/header.php'); ?>

      <main>
        <h1><strong>Liste des clients de votre entreprise</strong></h1>

        <?php
        echo "Lien client: http://localhost:8888/LoyaltyCard/CODE%20SOURCE/inscription_client.php?entreprise=".$_SESSION['name']."";
         ?>

        <div class="recherche">
            <input id="recherche" type="text" name="recherche" onkeyup="search()"  placeholder="Recherche entreprise">
        </div>
        <script src="./functions.js"></script>
<div class="ALL" id="ALL">


        <?php
                 include('Includes/connexion.php');

                 $q = 'SELECT name, firstname, email, addresse, country, codepostale, phone, entreprise FROM USER WHERE status = :Cl AND entreprise = :entreprise';
                 $req = $db->prepare($q);
                 $req->execute([
                   'Cl' =>  'Client',
                   'entreprise' => $_SESSION['name']
                 ]);



              $results = $req->fetchAll();

                  foreach($results as $value){
                    echo '<div class="contain">';
                      echo "<p>Nom : " .$value[0]. "</p>";
                      echo "<p>Prénom : " .$value[1]. "</p>";
                      echo "<p>Email : " .$value[2]. "</p>";
                      echo "<p>Adresse : " .$value[3]. "</p>";
                      echo "<p>Ville : " .$value[4]. "</p>";
                      echo "<p>Code postal : " .$value[5]. "</p>";
                      echo "<p>Téléphone : " .$value[6]. "</p>";
                      echo "<p>Entreprise : " .$value[7]. "</p>";
                      echo "<form action='delete_client.php' method='POST'>";
                      echo "<input type='hidden' name='email' value='" .$value[2]. "'>";
                      echo "<input class='remove' type='submit' value='Supprimer'>";
                    echo "</div>";

                    }
              ?>
            </div>
      </main>

    <?php include('Includes/footer.php'); ?>
  </body>
</html>
