<!DOCTYPE html>
<html>
    <head>
        <title>Pdf Reclamations</title>
</head>
<body>
<?php

require ("fpdf.php");
include "../../Controller/ReclamationC.php";

include_once "../../config.php";
$recC=new ReclamationC();
$listuser = $recC->afficherrec();

$db = config::getConnexion();

$display_heading = array( 'titre'=> 'titre', 'type'=> 'type','description'=> 'description','etat'=> 'etat',);
$sql = "SELECT titre, type, description, etat FROM reclamation";
$result= $db->query($sql);
$header = "SHOW COLUMNS(titre,type,description,etat) FROM reclamation";
$pdf = new  FPDF();



$pdf->AddPage();
$pdf->SetFont("Arial","B",19);


$pdf->Cell(210,10,"liste des Reclamations",1,1,'C');

$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(55,12,"titre","1","0","C");
$pdf->Cell(55,12,"type","1","0","C");
$pdf->Cell(55,12,"description","1","0","C");
$pdf->Cell(55,12," etat ","1","0","C");
foreach($header as $heading) {
$pdf->Cell(50,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(55,12,$column,1);
}
$pdf->Output('Reclamations','I','false');


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}







?>


</body>
</html>