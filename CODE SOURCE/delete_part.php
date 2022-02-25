<?php
session_start();


include('Includes/connexion.php');

  $q = 'DELETE FROM partenaire WHERE name = :name';
  $req = $db->prepare($q);
  $resultat =  $req->execute([
    'name' => $_POST['name']
  ]);

  $x = 'DELETE FROM reduction WHERE partenaire = :name';
  $rex = $db->prepare($x);
  $resultat =  $rex->execute([
    'name' => $_POST['name']
  ]);

  $i = 'DELETE FROM images WHERE name = :name';
  $rei = $db->prepare($i);
  $resultat =  $rei->execute([
    'name' => $_POST['name']
  ]);

  if($resultat){
    header('location:check_partenaire.php?message=entreprise Supprimer.&type=success');
  	exit;
  }else {header('location:check_partenaire.php?message=User est pas supprimer.&type=success');
  exit;
}

 ?>
