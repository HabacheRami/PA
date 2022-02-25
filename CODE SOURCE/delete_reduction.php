<?php
session_start();


include('Includes/connexion.php');

  $x = 'DELETE FROM reduction WHERE id = :id AND partenaire = :partenaire';
  $rex = $db->prepare($x);
  $resultat =  $rex->execute([
    'id' => $_POST['id'],
    'partenaire' => $_POST['partenaire']

  ]);


  if($resultat){
    header('location:check_partenaire.php?message=entreprise Supprimer.&type=success');
  	exit;
  }else {header('location:check_partenaire.php?message=User est pas supprimer.&type=success');
  exit;
}

 ?>
