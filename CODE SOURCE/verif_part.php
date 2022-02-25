<?php
if( !isset($_POST['nom']) || empty($_POST['nom']) ){
	header('location:add_part.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}

if(!isset($_FILES['image']) || empty($_FILES['image']['name'])){
	header('location:add_part.php?message=Vous devez mettre une image.&type=danger');
	exit;
}


include('Includes/connexion.php');



$q = 'SELECT name FROM partenaire WHERE name = :name';
$req = $db->prepare($q);
$req->execute([
	'name' => $_POST['nom']
]);

$resultat = $req->fetch();
if($resultat){
	header('location:add_part.php?message=Ce partenaire est déjà inscrit.&type=danger');
	exit;

}
$r = 'SELECT name FROM images WHERE name = :name';
$rer = $db->prepare($r);
$rer->execute([
	'name' => $_POST['nom']
]);

$resultar = $rer->fetch();

if($resultar){
	header('location:add_part.php?message=Ce partenaire est déjà inscrit.&type=danger');
	exit;
}

//verif ajout image dans le dossier partenaire
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

	// Vérifier le type de fichier
	$acceptable = [
		'image/jpeg',
		'image/png',
		'image/jfif',
		'image/jpg'
	];

	if(!in_array($_FILES['image']['type'], $acceptable)){
		header('location:add_part.php?message=Format de fichier incorrect.&type=danger');
		exit;
	}
}

$rex = $db->prepare('INSERT INTO images (name,size,type,bin) VALUES (?,?,?,?)');
$rex->execute(array($_POST['nom'],$_FILES['image']['size'],	$_FILES['image']['type'],file_get_contents($_FILES['image']['tmp_name'])));

$q = 'INSERT INTO partenaire (name) VALUES (:name)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'name' => $_POST['nom']
]);


if($reponse){
	header('location:check_partenaire.php?message=Compte créé avec succès !&type=success');
	exit;

}else{
	header('location:add_part.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
