<?php
require('fpdf.php');


try{
	$db = new PDO('mysql:host=localhost:8889;dbname=pa', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
	die('Erreur : ' . $e->getMessage()); // SI erreur, afficher le message d'erreur
}

$_SESSION['email'] = 'habache.rami@gmail.com';



class PDF_Code39 extends FPDF
{
	function Header()
	{
	    setlocale(LC_TIME, 'fr_FR');
	    date_default_timezone_set('Europe/Paris');

	    $this->Image('logo_LoyaltyCard.png', 10, 6);
	    // Saut de ligne
	    $this->Ln(50);
	    // Police Times gras 15
	    $this->SetFont('Times','B',14);
	    // Décalage à droite
	    $this->Cell(50, 7, 'Loyalty Card Society',0,1,'L');

	    // Police Times gras 15
	    $this->SetFont('Times','',12);
	    //Date du jour
	    $this->Cell(80,7,"Date : " . date(DATE_RFC2822),0,1,'L');
	    // Police Times gras 15
	    $this->SetFont('Times','',12);
	    // Titre
	    $this->Cell(65, 7, '242 rue du Faubourg Saint Antoine',0,1,'L');
	    // Titre
	    $this->Cell(65, 7, '75012, Paris',0,1,'L');
	    // Titre
	    $this->Cell(65, 7, '01 02 03 04 05',0,1,'L');
	    // Titre
	    $this->Cell(65, 7, 'Loyaltycard@gmail.com',0,0,'L');

	}

	function Footer()
	{
	    // Positionnement à 1,5 cm du bas
	    $this->SetY(-15);
	    // Police Times italique 8
	    $this->SetFont('Times','',8);
	    // Numéro de page
	    $this->Cell(0,10,'Page '.$this->PageNo().'/1',0,0,'C');
	}

	function viewTable($db){
	    $this->SetFont('Times','', 12);
	    $q = $db->query("SELECT * from user where email ='".$_SESSION['email']."'");
	    while ($row = $q->fetch(PDO::FETCH_OBJ)){
	        $name = $row->name;
	        $firstname = $row->firstname;
	        $address = $row->addresse;
	        $ville = $row->codepostale;
	        $telephone = $row->phone;
	        $country = $row->country;
	        $email = $row->email;

	        // Titre
	        $this->Cell(110, 7, $name . " " . $firstname,0,1,'R');
	        $this->Cell(175, 7, $address,0,1,'R');
	        $this->Cell(175, 7, $ville . ", " . $country,0,1,'R');
	        $this->Cell(175,7,$telephone,0,1,'R');
	        $this->Cell(175, 7, $email,0,1,'R');
	        $this->Ln(20);
	    }
	}

function Code39($xpos, $ypos, $code, $baseline=0.5, $height=5){
	$this->SetFont('Times','', 12);
	$this->Cell(115,7,'Intitule du document : Exportation du code barre au format PDF',0,1,'L');
	$this->Ln(20);

	$wide = $baseline;
	$narrow = $baseline / 3 ;
	$gap = $narrow;

	$barChar['0'] = 'nnnwwnwnn';
	$barChar['1'] = 'wnnwnnnnw';
	$barChar['2'] = 'nnwwnnnnw';
	$barChar['3'] = 'wnwwnnnnn';
	$barChar['4'] = 'nnnwwnnnw';
	$barChar['5'] = 'wnnwwnnnn';
	$barChar['6'] = 'nnwwwnnnn';
	$barChar['7'] = 'nnnwnnwnw';
	$barChar['8'] = 'wnnwnnwnn';
	$barChar['9'] = 'nnwwnnwnn';
	$barChar['A'] = 'wnnnnwnnw';
	$barChar['B'] = 'nnwnnwnnw';
	$barChar['C'] = 'wnwnnwnnn';
	$barChar['D'] = 'nnnnwwnnw';
	$barChar['E'] = 'wnnnwwnnn';
	$barChar['F'] = 'nnwnwwnnn';
	$barChar['G'] = 'nnnnnwwnw';
	$barChar['H'] = 'wnnnnwwnn';
	$barChar['I'] = 'nnwnnwwnn';
	$barChar['J'] = 'nnnnwwwnn';
	$barChar['K'] = 'wnnnnnnww';
	$barChar['L'] = 'nnwnnnnww';
	$barChar['M'] = 'wnwnnnnwn';
	$barChar['N'] = 'nnnnwnnww';
	$barChar['O'] = 'wnnnwnnwn';
	$barChar['P'] = 'nnwnwnnwn';
	$barChar['Q'] = 'nnnnnnwww';
	$barChar['R'] = 'wnnnnnwwn';
	$barChar['S'] = 'nnwnnnwwn';
	$barChar['T'] = 'nnnnwnwwn';
	$barChar['U'] = 'wwnnnnnnw';
	$barChar['V'] = 'nwwnnnnnw';
	$barChar['W'] = 'wwwnnnnnn';
	$barChar['X'] = 'nwnnwnnnw';
	$barChar['Y'] = 'wwnnwnnnn';
	$barChar['Z'] = 'nwwnwnnnn';
	$barChar['-'] = 'nwnnnnwnw';
	$barChar['.'] = 'wwnnnnwnn';
	$barChar[' '] = 'nwwnnnwnn';
	$barChar['*'] = 'nwnnwnwnn';
	$barChar['$'] = 'nwnwnwnnn';
	$barChar['/'] = 'nwnwnnnwn';
	$barChar['+'] = 'nwnnnwnwn';
	$barChar['%'] = 'nnnwnwnwn';

	$this->SetFont('Arial','',10);
	$this->Text($xpos, $ypos + $height + 4, $code);
	$this->SetFillColor(0);

	$code = '*'.strtoupper($code).'*';
	for($i=0; $i<strlen($code); $i++){
		$char = $code[$i];
		if(!isset($barChar[$char])){
			$this->Error('Invalid character in barcode: '.$char);
		}
		$seq = $barChar[$char];
		for($bar=0; $bar<9; $bar++){
			if($seq[$bar] == 'n'){
				$lineWidth = $narrow;
			}else{
				$lineWidth = $wide;
			}
			if($bar % 2 == 0){
				$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
			}
			$xpos += $lineWidth;
		}
		$xpos += $gap;
	}
		$this->Ln(20);
}


}

?>
