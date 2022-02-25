<?php
session_start();


include('Includes/connexion.php');

  $q = 'DELETE FROM user WHERE email = :email';
  $req = $db->prepare($q);
  $resultat =  $req->execute([
    'email' => $_POST['email']
  ]);


  if($resultat){
    header('location:userList.php?message=User Supprimer.&type=success');
  	exit;
  }else {header('location:userList.php?message=User est pas supprimer.&type=success');
  exit;
}

 ?>
