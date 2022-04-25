<?php
include('Includes/connexion.php');

if($_POST['res']=='partenaire'){
  if(!isset($_POST['name']) || empty($_POST['name'])){
  	header('location:demande.php?message=Vous devez remplir le champs nom.&type=danger');
  	exit;
  }

  if( !isset($_POST['email']) || empty($_POST['email'])){
  	header('location:demande.php?message=Vous devez remplir le champs email.&type=danger');
  	exit;
  }
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

  	header('location:demande.php?message=Email invalide.&type=danger');
  	exit;
  }

  if(strlen($_POST['password']) < 6){

    header('location:demande.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');
    exit;
  }

  if(strlen($_POST['passwordcheck']) < 6){

    header('location:demande.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');exit;
  }
  if(strlen($_POST['password']) <> strlen($_POST['passwordcheck'])){

    header('location:demande.php?message=Vos mot de passes ne sont pas identiques.&type=danger');
    exit;
  }

  if(strlen($_POST['siret']) <> 14 ){
  	header('location:demande.php?message=Erreur dans le numéro de siret.&type=danger');
  	exit;
  }

  if(!isset($_FILES['image']) || empty($_FILES['image']['name'])){
  	header('location:demande.php?message=Vous devez mettre une image.&type=danger');
  	exit;
  }



  $q = 'SELECT * FROM partenaire WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
  	'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
  	header('location:demande.php?message= Vous êtes déjà partenaire.&type=danger');
  	exit;
  }


  $q = 'SELECT * FROM demande WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
  	'name' => $_POST['name']
  ]);


  $resultat = $req->fetch();

  if($resultat){
  	header('location:demande.php?message= Vous êtes déjà en attente.&type=danger');
  	exit;
  }

  $q = 'SELECT * FROM demande WHERE email = :email';
  $req = $db->prepare($q);
  $req->execute([
    'email' => $_POST['email']
  ]);


  $resultat = $req->fetch();

  if($resultat){
    header('location:demande.php?message= Email déjà inscrit chez nous.&type=danger');
    exit;
  }

  $q = 'SELECT * FROM user WHERE email = :email';
  $req = $db->prepare($q);
  $req->execute([
    'email' => $_POST['email']
  ]);


  $resultat = $req->fetch();

  if($resultat){
    header('location:demande.php?message= Email déjà inscrit chez nous.&type=danger');
    exit;
  }

  $y = 'SELECT * FROM partenaire WHERE siret = :siret';
  $rey = $db->prepare($y);
  $rey->execute([
    'siret' => $_POST['siret']
  ]);

  $resultay = $rey->fetch();

  if($resultay){
    header('location:demande.php?message=siret déjà connu chez nous.&type=danger');
    exit;
  }

  $y = 'SELECT * FROM entreprise WHERE siret = :siret';
  $rey = $db->prepare($y);
  $rey->execute([
  	'siret' => $_POST['siret']
  ]);

  $resultay = $rey->fetch();

  if($resultay){
  	header('location:demande.php?message=siret déjà connu chez nous.&type=danger');
  	exit;
  }


  $r = 'SELECT name FROM images WHERE name = :name';
  $rer = $db->prepare($r);
  $rer->execute([
  	'name' => $_POST['name']
  ]);

  $resultar = $rer->fetch();

  if($resultar){
  	header('location:demande.php?message=Ce partenaire est déjà inscrit.&type=danger');
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
  $rex->execute(array($_POST['name'],$_FILES['image']['size'],	$_FILES['image']['type'],file_get_contents($_FILES['image']['tmp_name'])));


  $q = 'INSERT INTO `demande` (name, email, siret, password) VALUES (:name, :email, :siret, :password)';
  $req = $db->prepare($q);
  $reponse = $req->execute([
  	'name' => $_POST['name'],
    'email' => $_POST['email'],
    'siret' => $_POST['siret'],
  	'password' => hash('sha512', $_POST['password']),
  ]);

  if($reponse){
    $to      = $_POST['email'];
    $subject = "Demande partenaria";
    $message = "Votre demande de partenaria a bien été envoyé";
    $headers = "Content-Type : text/plain; charset=utf-8\r\n";
    $headers .= "From: habache.rami@gmail.com\r\n";

    if(mail($to, $subject, $message, $headers)){
      echo "l'envoie de mail fonctionne";
    }
      else {
        echo "erreur";
      }

  	header('location:index.php?message=Compte créé avec succès !&type=success');
  	exit;
  }else{
  	header('location:demande.php?message=Il y a eu une erreur.&type=danger');
  	exit;
  }

} else {
  if( !isset($_POST['name']) || empty($_POST['name'])){
  	header('location:demande.php?message=Vous devez remplir le champs non.&type=danger');
  	exit;
  }
  if( !isset($_POST['email']) || empty($_POST['email'])){
  	header('location:demande.php?message=Vous devez remplir le champs email.&type=danger');
  	exit;
  }
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

  	header('location:demande.php?message=Email invalide.&type=danger');
  	exit;
  }
  if( !isset($_POST['phone']) || empty($_POST['phone']) ){
  	header('location:demande.php?message=Vous devez remplir le champs telephone.&type=danger');
  	exit;
  }

  if( !isset($_POST['country']) || empty($_POST['country']) ){
  	header('location:demande.php?message=Vous devez remplir le champs ville.&type=danger');
  	exit;
  }

  if( !isset($_POST['addresse']) || empty($_POST['addresse']) ){
  	header('location:demande.php?message=Vous devez remplir le champs adresse.&type=danger');
  	exit;
  }
  if( !isset($_POST['codepostale']) || empty($_POST['codepostale']) ){
  	header('location:demande.php?message=Vous devez remplir le champs codepostale.&type=danger');
  	exit;
  }
  if( !isset($_POST['CA']) || empty($_POST['CA']) ){
  	header('location:demande.php?message=Vous devez remplir le champs CA.&type=danger');
  	exit;
  }
  if(strlen($_POST['password']) < 6){

  	header('location:demande.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');
  	exit;
  }

  if(strlen($_POST['passwordcheck']) < 6){

  	header('location:demande.php?message=Le mot de passe doit être avoir plus de 6 caractères.&type=danger');exit;
  }
  if(strlen($_POST['password']) <> strlen($_POST['passwordcheck'])){

  	header('location:demande.php?message=Vos mot de passes ne sont pas identiques.&type=danger');
  	exit;
  }
  if(strlen($_POST['siret']) <> 14 ){
  	header('location:demande.php?message=Erreur dans le numéro de siret.&type=danger');
  	exit;
  }



  $q = 'SELECT * FROM USER WHERE name = :name';
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
  	header('location:demande.php?message=Email déjà connu chez nous.&type=danger');
  	exit;
  }



  $q = 'SELECT * FROM demande WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
    'name' => $_POST['name']
  ]);
  $resultat = $req->fetch();
  if($resultat){
    header('location:demande.php?message= Vous êtes déjà en attente.&type=danger');
    exit;
  }

  $q = 'SELECT * FROM demande WHERE email = :email';
  $req = $db->prepare($q);
  $req->execute([
    'email' => $_POST['email']
  ]);
  $resultat = $req->fetch();

  if($resultat){
    header('location:demande.php?message= Vous êtes déjà en attente.&type=danger');
    exit;
  }

  $q = 'SELECT * FROM partenaire WHERE name = :name';
  $req = $db->prepare($q);
  $req->execute([
    'name' => $_POST['name']
  ]);
  $resultat = $req->fetch();
  if($resultat){
    header('location:demande.php?message= Vous êtes partenaire.&type=danger');
    exit;
  }


  $y = 'SELECT * FROM partenaire WHERE siret = :siret';
  $rey = $db->prepare($y);
  $rey->execute([
    'siret' => $_POST['siret']
  ]);
  $resultay = $rey->fetch();
  if($resultay){
    header('location:demande.php?message=siret déjà connu chez nous.&type=danger');
    exit;
  }


  $y = 'SELECT * FROM entreprise WHERE siret = :siret';
  $rey = $db->prepare($y);
  $rey->execute([
  	'siret' => $_POST['siret']
  ]);
  $resultay = $rey->fetch();
  if($resultay){
  	header('location:demande.php?message=siret déjà connu chez nous.&type=danger');
  	exit;
  }



  $q = 'INSERT INTO `demande` (name, password, phone, addresse, country, codepostale, email, CA,siret) VALUES (:name,:password,:phone,:addresse,:country, :codepostale, :email, :CA,:siret)';
  $req = $db->prepare($q);
  $reponse = $req->execute([
  	'name' => $_POST['name'],
  	'password' => hash('sha512', $_POST['password']),
  	'addresse' => $_POST['addresse'],
  	'country' => $_POST['country'],
  	'codepostale' => $_POST['codepostale'],
  	'phone' => $_POST['phone'],
  	'email' => $_POST['email'],
    'siret' => $_POST['siret'],
    'CA' => $_POST['CA']
]);


  if($reponse){
    $to      = $_POST['email'];
    $subject = "Demande adhésion";
    $message = "Votre demande d'adhésion a bien été envoyé";
    $headers = "Content-Type : text/plain; charset=utf-8\r\n";
    $headers .= "From: habache.rami@gmail.com\r\n";

    if(mail($to, $subject, $message, $headers)){
      echo "l'envoie de mail fonctionne";
    }
      else {
        echo "erreur";
      }

  	header('location:index.php?message=Compte créé avec succès !&type=success');
  	exit;
  }else{
  	header('location:demande.php?message=Il y a eu une erreur.&type=danger');
  	exit;
  }

}

 ?>
