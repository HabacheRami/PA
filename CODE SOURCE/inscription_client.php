
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/connexion.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
  </head>
  <body>
    <?php include('Includes/header.php');
          include('Includes/connexion.php');

$_SESSION['entreprise'] = $_GET['entreprise'];
          $q = 'SELECT name FROM USER  WHERE name =:name';
          $req = $db->prepare($q);
          $req->execute([
            'name' =>$_SESSION['entreprise']
          ]);


          $resultsq = $req->fetchAll();

         foreach ($resultsq as $key => $valueq) {
           $_SESSION['entreprise'] = $valueq[0];

          }
      ?>
      <div class="title">
        <h2>Inscription de votre entreprise</h2>
      </div>

        <form class="bodyconnect" action="verif_inscription_client.php" method="POST">
          <label> Nom :</label>
          <div class="name">
            <input type="text" name="name" placeholder="Nom">
          </div>

          <label> Prénom :</label>
          <div class="name">
            <input type="text" name="firstname" placeholder="Prénom">
          </div>

          <label> Email :</label>
          <div class="email">
            <input type="email" name="email" placeholder="inconnu@toi.fr">
          </div>

          <label>Téléphone :</label>
          <br>
          <div class="number">
            <input class="number" name="phone" type="number" min="0" max="9999999999" placeholder="XXXXXXXXXX">
          </div>

          <label>Ville :</label>
          <br>
          <div class="country">
            <input type="text" name="country" placeholder="Paris">
          </div>

          <label>Adresse :</label>
          <br>
          <div class="street">
            <input type="text" name="addresse" placeholder="23 Rue Erard">
          </div>

          <label>Code Postale :</label>
          <br>
          <div class="codepostale">
            <input type="number" name="codepostale" min="0" max="99999" placeholder="00000">
          </div>

             <label>Mot de passe :</label>
             <br>
             <div class="password">
               <input type="password" name="password" placeholder="Votre mot de passe">
             </div>

             <label>Vérifiez le mot de passe : </label>
             <br>
             <div class="passwordcheck">
               <input type="password" name="passwordcheck" placeholder="Confirmation mot de passe">
             </div>

            <input type='hidden' name='entreprise' value='<?php  echo $_SESSION["entreprise"] ?>'>
             <div class="bouton">
               <input class="envoie" type="submit" value="Enregistrer">
             </div>
          </form>
  </body>
</html>
