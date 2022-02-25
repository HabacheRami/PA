<?php
session_start();

if( !isset($_POST['email']) || empty($_POST['email'])){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs email.&type=danger');
	exit;
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

	header('location:inscription_entreprise.php?message=Email invalide.&type=danger');
	exit;
}
if( !isset($_POST['phone']) || empty($_POST['phone']) ){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs telephone.&type=danger');
	exit;
}

if( !isset($_POST['country']) || empty($_POST['country']) ){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs ville.&type=danger');
	exit;
}

if( !isset($_POST['addresse']) || empty($_POST['addresse']) ){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs adresse.&type=danger');
	exit;
}
if( !isset($_POST['codepostale']) || empty($_POST['codepostale']) ){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs codepostale.&type=danger');
	exit;
}
if( !isset($_POST['CA']) || empty($_POST['CA']) ){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs CA.&type=danger');
	exit;
}
if(strlen($_POST['password']) < 6){

	header('location:inscription_entreprise.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');
	exit;
}

if(strlen($_POST['passwordcheck']) < 6){

	header('location:inscription_entreprise.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');exit;
}
if(strlen($_POST['password']) <> strlen($_POST['passwordcheck'])){

	header('location:inscription_entreprise.php?message=Vos mot de passes ne sont pas identiques.&type=danger');
	exit;
}


include('Includes/connexion.php');



$q = 'SELECT name FROM USER WHERE name = :name';
$req = $db->prepare($q);
$req->execute([
	'name' => $_SESSION['entreprise']
]);


$resultat = $req->fetch();

if($resultat){
	header('location:index.php?message=Erreur contacter LoyaltyCard.&type=danger');
	exit;
}

$y = 'SELECT * FROM USER WHERE email = :email';
$rey = $db->prepare($y);
$rey->execute([
	'email' => $_POST['email']
]);

$resultay = $rey->fetch();

if($resultay){
	header('location:inscription_entreprise.php?message=Email déjà connu chez nous.&type=danger');
	exit;
}

$d = 'SELECT name FROM entreprise WHERE CA = :CA';
$red = $db->prepare($d);
$red->execute([
	'CA' => $_SESSION['id']
]);


$resultad = $red->fetch();

if($resultad){
	header('location:inscription_entreprise.php?message=Erreur contacter LoyaltyCard.&type=danger');
	exit;
}

$x = 'UPDATE `entreprise` SET CA= :CA WHERE name = :name';
$rex = $db->prepare($x);
$reponse = $rex->execute([
	'name' => $_SESSION['entreprise'],
	'CA' => $_POST['CA']
]);
$texte = "Entreprise";
$q = 'INSERT INTO `USER` (name, password, phone, status, addresse, country, codepostale, email, entreprise) VALUES (:name,:password,:phone,:status,:addresse,:country, :codepostale, :email, :entreprise)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'name' => $_SESSION['entreprise'],
	'password' => hash('sha512', $_POST['password']),
	'addresse' => $_POST['addresse'],
	'country' => $_POST['country'],
	'codepostale' => $_POST['codepostale'],
	'phone' => $_POST['phone'],
	'email' => $_POST['email'],
	'status' => $texte,
	'entreprise' => $_SESSION['entreprise']
]);


if($reponse){
	header('location:index.php?message=Compte créé avec succès !&type=success');
	echo "http://localhost:8888/PA/CODE%20SOURCE/inscription_client.php?entreprise=".$_GET['entreprise']."";
	exit;
}else{
	header('location:inscription_entreprise.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
