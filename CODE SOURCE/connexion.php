<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/connexion.css">
    <title>Connexion</title>
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/foot.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </head>
  <body>
    <?php include('Includes/header.php'); ?>
    <main>



      <?php include('Includes/result.php'); ?>

      <form class="bodyconnect" action="verif_connexion.php" method="post">

        <div class="title">
          <h2>Connexion</h2>
        </div>

        <label> Votre adresse mail :</label>
        <br>
        <div class="email">
          <input type="text" name="email" placeholder="Votre  email">
        </div>

        <br>
        <label> Mot de passe :</label>
        <br>
        <div class="password">
          <input type="password" name="password" placeholder="Mot de passe">
        </div>
        <br>


        <div class="bouton">
        <center><button class="envoie" type="submit" name="button">Se connecter</button></center>
        </div>

      </form>
  </main>

    <?php include('Includes/footer.php'); ?>
  </body>
</html>
