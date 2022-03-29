
<!DOCTYPE html>
<html lang="fr">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="CSS/demande.css">
   <link rel="stylesheet" href="CSS/footer.css">
   <title>LoyaltyCard</title>
   <link rel="stylesheet" href="CSS/header.css">
  </head>
  <body>
    <?php include('Includes/header.php');
      include('Includes/result.php');?>

      <div class="title">
        <h2>Demande d'inscription</h2>
      </div>

      <div class="bodyconnect">
        <form  action='verif_demande_p.php' method='POST'>

          <label>Vous êtes :</label>
          <input type="radio" id="part"  onchange='ask()' name="res" value="partenaire">Partenaire</input>
          <input type="radio" id="ent"  onchange='ask()' name="res" value="Entreprise">Entreprise Adhérente</input>

          <section id="check">
                Vous devez cocher une case !
          </section>
        </form>
          <script src="demande.js" charset="utf-8"></script>
      </div>
  <?php include('Includes/footer.php');?>
  </body>
</html>
