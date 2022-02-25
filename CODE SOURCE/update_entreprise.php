<?php
 session_start();

include('Includes/connexion.php');

if( !isset($_POST['name']) || empty($_POST['name']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}


if( !isset($_POST['phone']) || empty($_POST['phone']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs telephone.&type=danger');
	exit;
}

if(strlen($_POST['phone']) != 10){
	header('location:profil_entreprise.php?message=Un numéro de Téléphone contient 10 numéros.&type=danger');
	exit;
}

if( !isset($_POST['country']) || empty($_POST['country']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs ville.&type=danger');
	exit;
}

if( !isset($_POST['addresse']) || empty($_POST['addresse']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs adresse.&type=danger');
	exit;
}
if( !isset($_POST['codepostale']) || empty($_POST['codepostale']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs codepostale.&type=danger');
	exit;
}

if( !isset($_POST['CA']) || empty($_POST['CA']) ){
	header('location:profil_entreprise.php?message=Vous devez remplir le champs Chiffre d\'affaires.&type=danger');
	exit;
}

if(strlen($_POST['password'])!=0){
	if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 12){

		header('location:profil_entreprise.php?message=Le mot de passe doit être compris entre 6 et 12 caractères.&type=danger');
		exit;
	}

	if(strlen($_POST['passwordcheck']) < 6 || strlen($_POST['passwordcheck']) > 12){

		header('location:profil_entreprise.php?message=Le mot de passe de vérification doit être compris entre 6 et 12 caractères.&type=danger');
		exit;
	}
	if(strlen($_POST['password']) <> strlen($_POST['passwordcheck'])){

		header('location:profil_entreprise.php?message=Vos mot de passes ne sont pas identiques.&type=danger');
		exit;
	}
}


if (strlen($_POST['password'])!=0){
$q = 'UPDATE `USER` SET password= :password,phone= :phone,codepostale= :codepostale,addresse= :addresse,country= :country WHERE entreprise = :email';
$req = $db->prepare($q);
$reponse = $req->execute([
	'password' => $_POST['password'],
	'addresse' => $_POST['addresse'],
	'country' => $_POST['country'],
	'codepostale' => $_POST['codepostale'],
	'phone' => $_POST['phone'],
	'email' => $_SESSION['email']
]);

$x = 'UPDATE `entreprise` SET CA= :CA WHERE name = :name';
$rex = $db->prepare($x);
$reponse = $rex->execute([
	'name' => $_SESSION['name'],
	'CA' => $_POST['CA']
]);

}else {
	$q = 'UPDATE `USER` SET phone= :phone,codepostale= :codepostale,addresse= :addresse,country= :country WHERE email = :email';
	$req = $db->prepare($q);
	$reponse = $req->execute([
		'addresse' => $_POST['addresse'],
		'country' => $_POST['country'],
		'codepostale' => $_POST['codepostale'],
		'phone' => $_POST['phone'],
    'email' => $_SESSION['email']
	]);

  $x = 'UPDATE `entreprise` SET CA= :CA WHERE name = :name';
  $rex = $db->prepare($x);
  $reponse = $rex->execute([
  	'name' => $_SESSION['name'],
  	'CA' => $_POST['CA']
  ]);
}


if($reponse){
	header('location:profil_entreprise.php?message=coordonnées modifié avec succès !&type=success');
	exit;
}else{
	header('location:profil_entreprise.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
