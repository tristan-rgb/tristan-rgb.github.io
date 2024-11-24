<?php
require('fpdf185/fpdf.php');

class PDF extends pdf{
    function Header(){
        $this->Image('img/LogoDS.png', 10,8,33);
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(30,10,utf8_decode('HealthyLife'),0,0,'C');
        $this->Ln(20);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '',12);
    for($i=1;$i<=40;$i++)
        $pdf->Cell(0,10,'Imprimiendo linea numero '.$i,0,1);
    $pdf->Output('prueba_pdf.pdf','F');