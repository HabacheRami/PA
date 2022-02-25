<?php

if(!isset($_POST['email']) && empty($_POST['email'])){
	header('location:connexion.php?message=Email vide.&type=danger');
	exit;
}

if( !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) ){
	header('location:connexion.php?message=Vous devez remplir les 2 champs.&type=danger');
	exit;
}

$log = fopen('log.txt', 'a+');

$line = date("Y/m/d H:i:s") . ' - Tentative de connexion de : ' . $_POST['email'] . "\n";

fputs($log, $line);

fclose($log);


if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location:connexion.php?message=Email invalide.&type=danger');
	exit;
}



include('Includes/connexion.php');

$q = 'SELECT firstname, status, name FROM USER WHERE email = :email AND password = :password';
$req = $db->prepare($q);
$resultat = $req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha512', $_POST['password'])
]);

$resultat = $req->fetch();

if($resultat){
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['firstname'] = $resultat['firstname'];
	$_SESSION['name'] = $resultat['name'];
	$_SESSION['status'] = $resultat['status'];


if(date("d.m")=="15.02"){

	$x = 'UPDATE `USER` SET points= 0 WHERE email = :email';
	$reqq = $db->prepare($x);
	$reponse = $reqq->execute([
		'email' => $_SESSION['email']

	]);
	}


	header('location:index.php?=message=Vous etes connecté!&type=success');
	exit;
}else{
	header('location:connexion.php?message=Identifiants incorrects.&type=danger');
	exit;
}
?>
