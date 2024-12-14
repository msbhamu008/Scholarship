<?php

echo "<script>alert('sdcsc')</script>";
$scholar = $_POST['scholar'];
echo $scholar;
exit;


define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

class RegistrationForm extends FPDF {

    function __construct($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
        $this->FPDF($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
    }

    function Header() {

        // Logo
        $this->Ln(5);
        $this->Image('images/school_logo.jpg', 200, 6, 230);
        // Arial bold 15
        $this->SetFont('Arial', '', 8);
        // Move to the right
        $this->SetY(60);
        $this->Cell(260);
        // Title
        $this->Cell(5, 10, 'Salasar Main Rd, Nechhwa, Sikar, Rajasthan 332026, India', 1, 0, 'C');
        // Line break
        $this->Ln(12);
        $this->Cell(260);
        $this->Cell(30, 10, 'Tel.:01570-220033, Mob.:9828512821, E-mail: sunriseschool33@gmail.com, website: www.sunriseeduhub.in', 1, 0, 'C');
    
        $this->Rect(5, 5, 603, 780, 'D');
        
    }

    function Footer() {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(20, -60);
        $this->Cell(0, 20, "Thank you!", 'T', 0, 'C');
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '', 0, 0, 'C');
    }

}

$pdf = new RegistrationForm();
$pdf->AddPage();
$pdf->SetDrawColor(0,0,0);
$pdf->Line(20, 90, 610-20, 90); // 20mm from each edge
$pdf->SetFont('Arial', '', 12);
$pdf->SetY(100);
$pdf->Cell(100, 13, "Ordered By"); 
$pdf->SetFont('Arial', '',12); 
$pdf->Cell(100, 13, $_POST['scholar']);
$pdf->Output();
?>



