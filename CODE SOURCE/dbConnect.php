<?php
// try{
// 	$db = new PDO('mysql:host=localhost:3306;dbname=test_stripe', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// }catch(Exception $e){
// 	die('Erreur : ' . $e->getMessage()); // SI erreur, afficher le message d'erreur
// }



// Connect with the database
$db = new mysqli('localhost:8889', 'root', 'root', 'pa');

// Display error if failed to connect
if ($db->connect_errno) {
  printf("Connect failed: %s\n", $db->connect_error);
  exit();
}
?>
