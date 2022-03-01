<?php
if( !isset($_POST['name']) || empty($_POST['name']) ){
	header('location:add_produit.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}

if( !isset($_POST['price']) || empty($_POST['price']) ){
	header('location:add_produit.php?message=Vous devez remplir le champs price.&type=danger');
	exit;
}

if( !isset($_POST['description']) || empty($_POST['description']) ){
	header('location:add_produit.php?message=Vous devez remplir le champs description.&type=danger');
	exit;
}

if( !isset($_POST['quantite']) || empty($_POST['quantite']) ){
	header('location:add_produit.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}

if(!isset($_FILES['image']) || empty($_FILES['image']['name'])){
	header('location:add_produit.php?message=Vous devez mettre une image.&type=danger');
	exit;
}


include('Includes/connexion.php');

$q = 'SELECT * FROM `produits` WHERE name =:name AND entrepot = :entrepot';
$req = $db->prepare($q);
$resultat = $req->execute([
	'name' => $_POST['name'],
	'entrepot' => $_POST['entrepot']
]);


if(!$resultat){
	header('location:add_produit.php?message=Ce produit est déjà inscrit !.&type=danger');
	exit;
}


$r = 'SELECT name FROM images WHERE name = :name';
$rer = $db->prepare($r);
$rer->execute([
	'name' => $_POST['name']
]);

$resultar = $rer->fetch();

if($resultar){
	header('location:add_produit.php?message=Ce produit est déjà inscrit.&type=danger');
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
		header('location:add_produit.php?message=Format de fichier incorrect.&type=danger');
		exit;
	}
}

$rex = $db->prepare('INSERT INTO images (name,size,type,bin) VALUES (?,?,?,?)');
$rex->execute(array($_POST['name'],$_FILES['image']['size'],	$_FILES['image']['type'],file_get_contents($_FILES['image']['tmp_name'])));

$q = 'INSERT INTO produits (name,price,description,entrepot,quantite) VALUES (:name,:price,:description,:entrepot,:quantite)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'name' => $_POST['name'],
	'price' => $_POST['price'],
	'description' => $_POST['description'],
	'quantite' => $_POST['quantite'],
	'entrepot' => $_POST['entrepot']
]);


if($reponse){
	header('location:entrepot.php?message=Produit ajouté avec succès !&type=success');
	exit;

}else{
	header('location:add_produit.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
