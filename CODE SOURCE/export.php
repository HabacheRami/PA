<?php
  include("Includes/connexion.php");
  $req=$db->prepare("Select * from images where name=? limit 1");
  $req->SetFetchMode(PDO::FETCH_ASSOC);
  $req->execute(array($_GET["name"]));
  $tab=$req->fetchAll();
  echo $tab[0]["bin"];

 ?>
