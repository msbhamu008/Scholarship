<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if FPDF exists
if (!file_exists('fpdf/fpdf.php')) {
    http_response_code(500);
    die('FPDF library not found. Please check the installation.');
}

require_once('fpdf/fpdf.php');
require_once 'db_connection.php';

// Log the incoming request
error_log("Generating admit card for application_id: " . $_GET['application_id'] . " and class: " . $_GET['class']);

class PDF extends FPDF {
    // Page header
    function Header() {
        // Logo on the left
        $this->Image('../images/sunrise-logo.png',10,6,20);
        // Logo on the right
        $this->Image('../images/spark-logo.png',170,6,30);
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Get parameters
$application_id = $_GET['application_id'] ?? '';
$class = $_GET['class'] ?? '';

if (empty($application_id) || empty($class)) {
    http_response_code(400);
    die('Missing required parameters');
}

try {
    // Log database connection
    error_log("Attempting database connection");
    
    // Fetch student details
    $query = "SELECT * FROM scholarship_registrations WHERE application_id = ? AND class = ?";
    error_log("Executing query: " . $query . " with params: " . $application_id . ", " . $class);
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    
    $stmt->bind_param("ss", $application_id, $class);
    if (!$stmt->execute()) {
        throw new Exception("Failed to execute query: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    if (!$result) {
        throw new Exception("Failed to get result: " . $stmt->error);
    }

    if ($result->num_rows === 0) {
        http_response_code(404);
        die('Student not found for application_id: ' . $application_id . ' and class: ' . $class);
    }

    $student = $result->fetch_assoc();
    error_log("Student data retrieved: " . json_encode($student));

    // Create PDF
    error_log("Creating PDF");
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Draw border around the admit card
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(5, 5, 200, 287); // Adjust dimensions as needed
    
     // Add watermark
    $pdf->Image('../images/watermark.png', 30, 90, 150, 150, 'PNG', '', '', false, 300, '', false, false, 0, false, false, true);
    // $pdf->SetAlpha(0.1); // Make watermark transparent
    // Reset alpha for rest of the content
    // $pdf->SetAlpha(1);
    
       // Generate QR codes if they don't exist
    if (!file_exists('../images/location_qr.png')) {
        QRcode::png("https://maps.google.com/?q=Sunrise+International+Public+School+Nechhwa", '../images/location_qr.png', 'L', 4, 2);
    }
    if (!file_exists('../images/website_qr.png')) {
        QRcode::png("https://sunriseschool.edu.in", '../images/website_qr.png', 'L', 4, 2);
    }


    // Title
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'SCHOLARSHIP ADMIT CARD',0,1,'C');
    $pdf->Ln(5);

    // Student Details
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Student Details',0,1,'L');
    $pdf->SetFont('Arial','',12);
    
    // Draw border for student details
    $pdf->Rect(10, 55, 190, 65);
    
    // Add photo box on the right side
    $pdf->Rect(160, 60, 35, 45); // Box for photo
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(160, 106);
    $pdf->Cell(35, 5, 'Student Photo', 0, 1, 'C');
    
    // Reset font for details
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(10, 60);
    
    // Details in a table format (adjusted width to accommodate photo)
    $pdf->Cell(50,10,'Name:',0,0);
    $pdf->Cell(90,10,($student['full_name'] ?? 'N/A'),0,1);
    $pdf->Cell(50,10,'Class:',0,0);
    $pdf->Cell(90,10,($student['class'] ?? 'N/A'),0,1);
    $pdf->Cell(50,10,'Exam ID:',0,0);
    $pdf->Cell(90,10,($student['exam_id'] ?? 'N/A'),0,1);
    $pdf->Cell(50,10,'School:',0,0);
    $pdf->Cell(90,10,($student['school_name'] ?? 'N/A'),0,1);
    $pdf->Cell(50,10,'City:',0,0);
    $pdf->Cell(90,10,($student['city'] ?? 'N/A'),0,1);
    $pdf->Cell(50,10,'Parent Phone:',0,0);
    $pdf->Cell(90,10,($student['parent_phone'] ?? 'N/A'),0,1);

    // If student photo exists, add it to the box
    if (isset($student['photo_path']) && file_exists($student['photo_path'])) {
        $pdf->Image($student['photo_path'], 160, 60, 35, 45);
    }

    // Exam Details
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Exam Details',0,1,'L');
    $pdf->SetFont('Arial','',12);
    
    // Draw border for exam details
    $pdf->Rect(10, 130, 190, 25);
    
    // Add exam date and time
    $pdf->Cell(50,10,'Exam Date:',0,0);
    $pdf->Cell(0,10,'25th December',0,1);
    $pdf->Cell(50,10,'Exam Venue:',0,0);
    $pdf->Cell(0,10,'Sunrise International Public School, Nechhwa',0,1);
    
    // Instructions
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Important Instructions:',0,1,'L');
    $pdf->SetFont('Arial','',12);
    
    // Draw border for instructions
    $pdf->Rect(10, 165, 190, 75);
    
    $instructions = array(
        "1. Please arrive at the exam center 30 minutes before the scheduled time.",
        "2. Bring a valid photo ID proof.",
        "3. Carry this admit card to the exam center.",
        "4. Follow all exam center guidelines and protocols.",
        "5. Use blue/black pen only.",
        "6. Mobile phones and electronic devices are not allowed.",
        "7. Any malpractice will lead to disqualification."
    );
    
    foreach($instructions as $instruction) {
        $pdf->MultiCell(0,10,$instruction);
    }
     // Add QR codes at bottom
    $pdf->Image('../images/location_qr.png', 10, 270, 20);
    $pdf->Image('../images/website_qr.png', 170, 270, 20);
    
    // Signature Boxes
    $pdf->Ln(10);
    $pdf->Cell(90,10,'_____________________',0,0,'C');
    $pdf->Cell(90,10,'_____________________',0,1,'C');
    $pdf->Cell(90,10,'Student Signature',0,0,'C');
    $pdf->Cell(90,10,'Parent Signature',0,1,'C');

    error_log("Generating PDF output");
    // Output PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="admit_card_'.$application_id.'.pdf"');
    ob_clean(); // Clean output buffer
    $pdf->Output('D', 'admit_card_'.$application_id.'.pdf');

} catch (Exception $e) {
    error_log("Error generating admit card: " . $e->getMessage());
    http_response_code(500);
    die('Error generating admit card: ' . $e->getMessage());
}
?>