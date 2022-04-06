<?php
$to      = "luc21.pierre@gmail.com";
$subject = "the subject";
$message = "L'envoie de mail fonctionne 😁";
$headers = "Content-Type : text/plain; charset=utf-8\r\n";
$headers .= "From: habache.rami@gmail.com\r\n";

if(mail($to, $subject, $message, $headers)){
  echo "l'envoie de mail fonctionne";
}
  else {
    echo "erreur";
  }
?>
