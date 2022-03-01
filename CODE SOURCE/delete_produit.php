<?php
session_start();


include('Includes/connexion.php');

  $q = 'DELETE FROM produits WHERE name = :name AND entrepot = :entrepot';
  $req = $db->prepare($q);
  $resultat =  $req->execute([
    'name' => $_POST['produit'],
    'entrepot' => $_POST['entrepot']
  ]);

  $q = 'DELETE FROM images WHERE name = :name';
  $req = $db->prepare($q);
  $resultat =  $req->execute([
    'name' => $_POST['produit'],
  ]);

  if($resultat){
    header('location:entrepot.php?message=User Supprimer.&type=success');
  	exit;
  }else {
    header('location:entrepot.php?message=User est pas supprimer.&type=success');
    exit;
}

 ?>
