<?php
 session_start();

include('Includes/connexion.php');

if( !isset($_POST['description']) || empty($_POST['description']) ){
	header('location:produit.php?message=Vous devez remplir le champs description.&type=danger');
	exit;
}
if( !isset($_POST['prix']) || empty($_POST['prix']) ){
	header('location:produit.php?message=Vous devez remplir le champs prix.&type=danger');
	exit;
}
if( !isset($_POST['quantite']) || empty($_POST['quantite']) ){
	header('location:produit.php?message=Vous devez remplir le champs quantite.&type=danger');
	exit;
}

$q = 'UPDATE `produits` SET `price`= :price ,`description`= :description ,`quantite`=:quantite WHERE `name` =:name AND entrepot = :entrepot' ;
$req = $db->prepare($q);
$reponse = $req->execute([
	'description' => $_POST['description'],
	'price' => $_POST['prix'],
  'quantite' => $_POST['quantite'],
  'name' => $_POST['produit'],
  'entrepot' => $_POST['entrepot']

	]);



if($reponse){
	header('location:entrepot.php?message=produit modifié avec succès !&type=success');
	exit;
}else{
	header('location:entrepot.php?message=Il y a eu une erreur.&type=danger');
	exit;
}

?>
