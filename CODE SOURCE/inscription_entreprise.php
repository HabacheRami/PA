
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/connexion.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </head>
  <body>
    <?php include('Includes/header.php');
       include('Includes/result.php');
          include('Includes/connexion.php');

          if($_GET['entreprise'] != $_GET['entreprise'] + $_GET['id']){
            $result = $_GET['entreprise'] - $_GET['id'];
          $q = 'SELECT name FROM entreprise  WHERE CA =:CA';
          $req = $db->prepare($q);
          $req->execute([
            'CA' => $result
          ]);

          $resultsq = $req->fetchAll();

          if(!$resultsq){
          	header('location:index.php?message=Essaye pas de t\'inscrire en douce!&type=danger');
          	exit;
          }else{

             foreach ($resultsq as $key => $valueq) {
               $_SESSION['entreprise'] = $valueq[0];
               $_SESSION['id'] = $_GET['entreprise'] ;
             }
           }
         }
      ?>
      <div class="title">
        <h2>Inscription de votre entreprise</h2>
      </div>

        <form class="bodyconnect" action="verif_inscription_entreprise.php" method="POST">
          <label> Nom :</label>
          <div class="name">
            <input type="text" name="name" value="<?php echo $_SESSION['entreprise']; ?>" disabled>
          </div>

          <label> Email :</label>
          <div class="email">
            <input type="email" name="email" placeholder="inconnu@toi.fr">
          </div>

          <label>Téléphone :</label>
          <br>
          <div class="number">
            <input class="number" name="phone" type="number" max="9999999999" placeholder="XXXXXXXXXX">
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

             <label>CA :</label>
             <br>
             <div class="number">
               <input class="CA" name="CA" type="number" min="0" placeholder="45059845">
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
               <center><input class="envoie" type="submit" value="Enregistrer"></center>
             </div>
          </form>
    <?php include('Includes/footer.php'); ?>
  </body>
</html>
