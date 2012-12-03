<?php
require('../config.php');
require('../libraries/fpdf/fpdf.php');
require('../libraries/core/core.php');
require('../model/mod_report/reportDAO.php');

$reportDAO = new reportDAO();

class PDF extends FPDF{
    //Page header
    public function Header() {
        $SConfig = new SConfig();
        $count = count($SConfig->systemname);
        //Logo
        $this->Image('report.png',10,5,20);  
        //Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        //Move para o esquerdo
        $this->Cell(80);
        //Title
        $this->Cell(40,10,$SConfig->systemname,1,0,'C');
        //Line break;
        $this->Ln(20);
    }
    public function Footer(){
        //Postition at 1,15 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Page numbur
        $this->Cell(0,10,"2012-2012. Raphael Desenvolvimentos. Todos os direitos resevados.",0,0,'C');
        //Page numbur
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    }
}

//Instacia os class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Times","",12);
$pdf->Cell(0,10,"___________________________________Lista de ACESOS____________________________________",0,0);
$pdf->Ln(10);
foreach($reportDAO->listDate('access') as $resReportDAO){
    $separar = explode('|', $resReportDAO[2]);
    $pdf->Ln(10);
    $pdf->Cell(0,10,"$separar[0]",0,0);
    $pdf->Ln(10);
    $pdf->Cell(0,10,"$separar[1]",0,0);
    $pdf->Ln(10);
    $pdf->Cell(0,10,"$separar[2]",0,0);
    $pdf->Ln(10);
    $pdf->Cell(0,10,"$separar[3]",0,0);
    $pdf->Ln(10);
    if(@$separar[4] != ""){
        $pdf->Cell(0,10,"$separar[4]",0,0);
        $pdf->Ln(10);
        $pdf->Cell(0,10,"$separar[5]",0,0);
        $pdf->Ln(10);
        $pdf->Cell(0,10,"$separar[6]",0,0);
        $pdf->Ln(10);
        $pdf->Cell(0,10,"$separar[7]",0,0);
    }
    $pdf->Ln(10);
    $pdf->Cell(0,10,"_____________________________________________________________________________________",0,0);
    $pdf->Ln(10);
}
/*for($i = 1; $i <= 40; $i++){
    $pdf->Cell(0,10,"___________________________________________________________________________________________".$i,0,1);
    $pdf->Cell(0,10,"___________________________________________________________________________________________".$i,0,1);
}*/
$pdf->Output();