<?php
if( !isset($_POST['montant']) || empty($_POST['montant']) ){
	header('location:add_part.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}

if( !isset($_POST['type']) || empty($_POST['type']) ){
	header('location:add_part.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}
if( !isset($_POST['description']) || empty($_POST['description']) ){
	header('location:add_part.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}


include('Includes/connexion.php');



$q = 'SELECT description FROM reduction WHERE description = :description';
$req = $db->prepare($q);
$req->execute([
	'description' => $_POST['description']
]);


$resultat = $req->fetch();

if($resultat){
	header('location:add_part.php?message=Cette réduction existe déjà !&type=danger');
	exit;
}

//verif ajout image dans le dossier partenaire

$q = 'INSERT INTO reduction (montant, type, description, partenaire) VALUES (:montant, :type , :description, :partenaire )';
$req = $db->prepare($q);
$reponse = $req->execute([
	'montant' => $_POST['montant'],
	'type' => $_POST['type'],
	'description' => $_POST['description'],
	'partenaire' => $_POST['partenaire']

]);

if($reponse){
	header('location:check_partenaire.php?message=Compte créé avec succès !&type=success');
	exit;

}else{
	header('location:add_red.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
