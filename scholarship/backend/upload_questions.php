<?php
require 'vendor/autoload.php';
require_once 'db_connect.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'File upload error.']);
    exit;
}

$file = $_FILES['file']['tmp_name'];

try {
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    $conn->begin_transaction();

    foreach ($rows as $index => $row) {
        if ($index === 0) continue; // Skip header row

        list($class, $question, $optionA, $optionB, $optionC, $optionD, $correctAnswer) = $row;

        $stmt = $conn->prepare("INSERT INTO scholarship_exam_questions (class, question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $class, $question, $optionA, $optionB, $optionC, $optionD, $correctAnswer);
        $stmt->execute();
    }

    $conn->commit();

    echo json_encode(['success' => true, 'message' => 'Questions uploaded successfully.']);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Error processing file: ' . $e->getMessage()]);
}

$conn->close();
?>
