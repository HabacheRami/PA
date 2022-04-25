<?php
include('Includes/connexion.php');


if (isset($_POST['supp'])) {
	if($_POST['type']=='partenaire'){
			$q = 'DELETE FROM `demande` WHERE name =:name';
			$req = $db->prepare($q);
			$resultat = $req->execute([
				'name' => $_POST['name']
			]);

			$q = 'DELETE FROM `images` WHERE name =:name';
			$req = $db->prepare($q);
			$resultat = $req->execute([
				'name' => $_POST['name']
			]);

			if($resultat){
				$to      = $_POST["email"];
				$subject = "Demande de partenaria LoyaltyCard";
				$message = "Nous sommes dans le regret de vous informer que votre demande de partenaria n'a pas été accepté";
				$headers = "Content-Type : text/plain; charset=utf-8\r\n";
				$headers .= "From: habache.rami@gmail.com\r\n";

				if(mail($to, $subject, $message, $headers)){
					echo "good";
				}
					else {
						echo "not good";
					}
				header('location:demande_admin.php?message=Demande supprimé !! &type=danger');
				exit;
			}
	}
	else //($_POST['type']=='entreprise'){
	{

		$q = 'DELETE FROM `demande` WHERE name =:name';
		$req = $db->prepare($q);
		$resultat = $req->execute([
			'name' => $_POST['name']
		]);

		if($resultat){
			$to      = $_POST["email"];
			$subject = "Demande d'adhésion LoyaltyCard";
			$message = "Nous sommes dans le regret de vous informer que votre demande d'adhésion n'a pas été accepté";
			$headers = "Content-Type : text/plain; charset=utf-8\r\n";
			$headers .= "From: habache.rami@gmail.com\r\n";

			if(mail($to, $subject, $message, $headers)){
				echo "good";
			}
				else {
					echo "not good";
				}
			header('location:demande_admin.php?message=Demande supprimé !! &type=danger');
			exit;
		}

	}


}






	if (isset($_POST['val'])) {
		if($_POST['type']=='partenaire'){


			$qq = 'SELECT name, siret, email,password FROM demande where name=:name';
			$reqq = $db->prepare($qq);
			$reqq->execute([
				'name' => $_POST['name']
			]);
			$siret;
			$email;
			$password;
			 $resultsq = $reqq->fetchAll();
			 foreach ($resultsq as $key => $valueq) {
				 $siret = $valueq[1];
				 $email= $valueq[2];
				 $password= $valueq[3];
			 }

			$x = 'INSERT INTO `partenaire` (name,siret) VALUES (:name,:siret)';
			$rex = $db->prepare($x);
			$reponsx = $rex->execute([
				'name' => $_POST['name'],
				'siret' => $siret
			]);

			$z = 'INSERT INTO `user` (name,email,password, status, entreprise) VALUES (:name, :email,:password, :status,:entreprise)';
			$re = $db->prepare($z);
			$repons = $re->execute([
				'name' => $_POST['name'],
				'email' => $email,
				'password' => $password,
				'status' => 'Partenaire',
				'entreprise' => $_POST['name']
			]);


			$q = 'DELETE FROM `demande` WHERE name =:name';
			$req = $db->prepare($q);
			$resultat = $req->execute([
				'name' => $_POST['name']
			]);


			if($reponsx){
				$to      = $_POST["email"];
				$subject = "Demande de partenaria LoyaltyCard";
				$message = "Nous sommes dans le plaisir de vous informer que votre demande de partenaria n'a pas été accepté";
				$headers = "Content-Type : text/plain; charset=utf-8\r\n";
				$headers .= "From: habache.rami@gmail.com\r\n";

				if(mail($to, $subject, $message, $headers)){
					echo "good";
				}
					else {
						echo "not good";
					}
				header('location:demande_admin.php?message=Partenaire Ajouté !.&type=danger');
				exit;
			}
		}

		else //($_POST['type']=='entreprise'){
{
		$q = 'DELETE FROM `demande` WHERE name =:name';
		$req = $db->prepare($q);
		$resultat = $req->execute([
			'name' => $_POST['name']
		]);

		if(!$resultat){
			header('location:demande_admin.php?message=Erreur !&type=danger');
			exit;
		}

		$qq = 'SELECT * FROM demande where name=:name';
		$reqq = $db->prepare($qq);
		$reqq->execute([
			'name' => $_POST['name']
		]);

		$name;
		$password;
		$phone;
		$addresse;
		$country;
		$codepostale;
		$email;
		$CA;
		$siret;
		 $resultsq = $reqq->fetchAll();
		 foreach ($resultsq as $key => $valueq) {
			 $name=$valueq[0];
			 $password=$valueq[3];
			 $phone=$valueq[4];
			 $addresse=$valueq[5];
			 $country=$valueq[1];
			 $codepostale=$valueq[6];
			 $email=$valueq[2];
			 $CA=$valueq[7];
			 $siret=$valueq[8];
		 }


		$q = 'INSERT INTO `user` (name, password, phone, addresse, country, codepostale, email,status, entreprise) VALUES (:name,:password,:phone,:addresse,:country, :codepostale, :email, :status, :entreprise)';
		$req = $db->prepare($q);
		$reponse = $req->execute([
			'name' =>  $name,
			'password' => $password,
			'addresse' => 	$addresse,
			'country' => $country,
			'codepostale' => $codepostale,
			'phone' => $phone,
			'email' => $email,
			'status'  => 'entreprise',
			'entreprise'  => $name
		]);


		$x = 'INSERT INTO `entreprise` (name, CA, siret) VALUES (:name,:CA, :siret)';
		$rex = $db->prepare($x);
		$reponsx = $rex->execute([
			'name' =>  $name,
			'CA' =>  $CA,
			'siret' => $siret
		]);



		$q = 'DELETE FROM `demande` WHERE name =:name';
		$req = $db->prepare($q);
		$resultat = $req->execute([
			'name' => $_POST['name']
		]);

		if($resultat){
			$to      = $_POST["email"];
			$subject = "Demande d'adhésion LoyaltyCard";
			$message = "Nous sommes dans le regret de vous informer que votre demande d'adhésion n'a pas été accepté";
			$headers = "Content-Type : text/plain; charset=utf-8\r\n";
			$headers .= "From: habache.rami@gmail.com\r\n";

			if(mail($to, $subject, $message, $headers)){
				echo "good";
			}
				else {
					echo "not good";
				}
			header('location:demande_admin.php?message=Validation success !&type=success');
			exit;
		}
	else{
			header('location:demande_admin.php?message=Erreur.&type=danger');
			exit;
		}
	}
}
