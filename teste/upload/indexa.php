<?php
require '../libraries/fpdf/fpdf.php';

class SPDF extends FPDF{
    public function Header() {
        //Logs
        $this->Image('report.png',10,6,30);
        //Arial bols 15
        $this->SetFont('Arial', 'B', 15);
        //Mover para a direita
        $this->Cell(80);
        //Titulo
        $this->Cell(30,10,'Title',1,0,'C');
        //Linha de parada
        $this->Ln(20);
    }
    public function Footer(){
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Page numbur
        $this->Cell(0,10, 'Page'.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

$pdf =  new SPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
for($i = 1; $i <= 40; $i++)
        $pdf->Cell(0, 10, 'O numero imprimido'.$i, 0, 1);
$pdf->Output();