<?php
require('code39.php');

try{
	$db = new PDO('mysql:host=localhost:8889;dbname=pa', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
	die('Erreur : ' . $e->getMessage()); // SI erreur, afficher le message d'erreur
}



// Instanciation de la classe dérivée

//$pdf->codeBarre($db);


$code = '3452035939203';
$pdf1 = new PDF_Code39();
$pdf1->AddPage();
$pdf1->viewTable($db);
$pdf1->Code39(100, 190,$code,0.5,15,'C');
$pdf1->Output();
?>
