<?php

if($_POST['res']=='partenaire'){
  if(!isset($_POST['name']) || empty($_POST['name'])){
  	header('location:demande.php?message=Vous devez remplir le champs nom.&type=danger');
  	exit;
  }


  include('Includes/connexion.php');

  $q = 'SELECT name FROM partenaire WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
  	'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
  	header('location:demande.php?message= Vous êtes déjà partenaire.&type=danger');
  	exit;
  }

  $q = 'SELECT name FROM demande WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
  	'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
  	header('location:demande.php?message= Vous êtes déjà en attente.&type=danger');
  	exit;
  }

  $q = 'INSERT INTO `demande` (name) VALUES (:name)';
  $req = $db->prepare($q);
  $reponse = $req->execute([
  	'name' => $_POST['name']
  ]);

  if($reponse){
  	header('location:index.php?message=Compte créé avec succès !&type=success');
  	exit;
  }else{
  	header('location:inscription_entreprise.php?message=Il y a eu une erreur.&type=danger');
  	exit;
  }

} else {
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
  	'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
  	header('location:index.php?message=Vous êtes déjà adhérente.&type=danger');
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

  $q = 'SELECT name FROM demande WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
    'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
    header('location:demande.php?message= Vous êtes déjà en attente.&type=danger');
    exit;
  }


  $q = 'INSERT INTO `demande` (name, password, phone, addresse, country, codepostale, email, CA) VALUES (:name,:password,:phone,:addresse,:country, :codepostale, :email, :CA)';
  $req = $db->prepare($q);
  $reponse = $req->execute([
  	'name' => $_POST['name'],
  	'password' => hash('sha512', $_POST['password']),
  	'addresse' => $_POST['addresse'],
  	'country' => $_POST['country'],
  	'codepostale' => $_POST['codepostale'],
  	'phone' => $_POST['phone'],
  	'email' => $_POST['email'],
    'CA' => $_POST['CA']
]);

  if($reponse){
  	header('location:index.php?message=Compte créé avec succès !&type=success');
  	exit;
  }else{
  	header('location:demande.php?message=Il y a eu une erreur.&type=danger');
  	exit;
  }

}

 ?>
