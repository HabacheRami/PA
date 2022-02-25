<?php
session_start();


include('Includes/connexion.php');

  $q = 'DELETE FROM entreprise WHERE name = :name';
  $req = $db->prepare($q);
  $resultats =  $req->execute([
    'name' => $_POST['entreprise']
  ]);
  $x = 'DELETE FROM user WHERE entreprise = :name';
  $rex = $db->prepare($x);
  $resultat =  $rex->execute([
    'name' => $_POST['entreprise']
  ]);

  if($resultat){
    header('location:deconnexion.php?message=entreprise Supprimer.&type=success');
  	exit;
  }else {header('location:entreprise.php?message=User est pas supprimer.&type=success');
  exit;
}

 ?>
