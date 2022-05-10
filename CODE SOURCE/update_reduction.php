<?php
 session_start();

include('Includes/connexion.php');

if( !isset($_POST['description']) || empty($_POST['description']) ){
	header('location:reduction_'.$_SESSION['status'].'.php?message=Vous devez remplir le champs description.&type=danger');
	exit;
}
if( !isset($_POST['type']) || empty($_POST['type']) ){
	header('location:reduction_'.$_SESSION['status'].'.php?message=Vous devez remplir le champs type.&type=danger');
	exit;
}
if( !isset($_POST['montant']) || empty($_POST['montant']) ){
	header('location:reduction_'.$_SESSION['status'].'.php?message=Vous devez remplir le champs montant.&type=danger');
	exit;
}

$q = 'UPDATE `reduction` SET `montant`= :montant ,`description`= :description ,`type`=:type WHERE `id` =:id' ;
$req = $db->prepare($q);
$reponse = $req->execute([
	'description' => $_POST['description'],
	'montant' => $_POST['montant'],
  'type' => $_POST['type'],
  'id' => $_POST['id']

	]);



if($reponse){
	header('location:index.php?message=produit modifié avec succès !&type=success');
	exit;
}else{
	header('location:index.php?message=Il y a eu une erreur.&type=danger');
	exit;
}

?>
