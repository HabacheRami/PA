<?php
session_start();
if( !isset($_POST['name']) || empty($_POST['name'])){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs nom.&type=danger');
	exit;
}
if( !isset($_POST['firstname']) || empty($_POST['firstname'])){
	header('location:inscription_entreprise.php?message=Vous devez remplir le champs prénom.&type=danger');
	exit;
}
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



$y = 'SELECT * FROM USER WHERE email = :email';
$rey = $db->prepare($y);
$rey->execute([
	'email' => $_POST['email']
]);

$resultay = $rey->fetch();

if($resultay){
	header('location:inscription_client.php?message=Email déjà connu chez nous.&type=danger');
	exit;
}

$y = 'SELECT * FROM loyalty WHERE user = :user';
$rey = $db->prepare($y);
$rey->execute([
	'user' => $_POST['email']
]);

$resultay = $rey->fetch();

if($resultay){
	header('location:inscription_client.php?message=Email déjà connu chez nous.&type=danger');
	exit;
}

$texte = "Client";
$q = 'INSERT INTO `USER` (name, password, phone, status, addresse, country, codepostale, email, entreprise, firstname) VALUES (:name,:password,:phone,:status,:addresse,:country, :codepostale, :email, :entreprise, :firstname)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'name' => $_POST['name'],
	'password' => hash('sha512', $_POST['password']),
	'addresse' => $_POST['addresse'],
	'firstname' => $_POST['firstname'],
	'country' => $_POST['country'],
	'codepostale' => $_POST['codepostale'],
	'phone' => $_POST['phone'],
	'email' => $_POST['email'],
	'status' => $texte,
	'entreprise' => $_SESSION['entreprise']
]);


//Création du code barre


$q = 'SELECT card FROM loyalty WHERE card = (SELECT MAX(card) FROM loyalty)';
$req = $db->prepare($q);
$req->execute([]);
$resultsq = $req->fetchAll();

foreach ($resultsq as $key => $valueq) {
  $end = $valueq[0];
}

$start = '34520359';

$barcode = $start.($end +1);

$x = 'INSERT INTO `loyalty` (points, user, barcode) VALUES (:points,:user,:barcode)';
$rex = $db->prepare($x);
$reponsx = $rex->execute([
	'barcode' => $barcode,
	'password' => "0",
	'user' => $_POST['email']
]);


if($reponsx){
	header('location:index.php?message=Compte créé avec succès !&type=success');
	exit;
}else{
	header('location:inscription_client.php?message=Il y a eu une erreur.&type=danger');
	exit;
}
