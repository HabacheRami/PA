<?php

if( !isset($_POST['name']) || empty($_POST['name']) ){
	header('location:add_entreprise.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}

include('Includes/connexion.php');



$q = 'SELECT name FROM entreprise WHERE name = :name';
$req = $db->prepare($q);
$req->execute([
	'name' => $_POST['name']
]);


$resultat = $req->fetch();

if($resultat){
	header('location:add_entreprise.php?message=Cette entreprise est déjà inscrite.&type=danger');
	exit;
}

$id=0;
for($i = 0; $i < strlen($_POST['name']); $i++){
	$id = $id + getrandmax();
}

$q = 'INSERT INTO entreprise (name, CA) VALUES (:name, :CA)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'name' => $_POST['name'],
 	'CA' => $id
]);

$test = 97412517578;
$id += $test;


if($id){
	header('location:link.php?message=L\'entreprise a été ajouté !&entreprise='.$id.'&id='.$test.'&type=success');
exit;
	exit;
}else{
	header('location:add_entreprise.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
