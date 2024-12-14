<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once 'db_connection.php';

// Update table name to scholarship_exam_settings
$query = "SELECT * FROM scholarship_exam_settings WHERE is_active = 1";
$result = $conn->query($query);
$exam_settings = $result->fetch_assoc();

echo json_encode([
    'status' => 'success',
    'data' => [
        'is_active' => (bool)$exam_settings['is_active'],
        'exam_date' => $exam_settings['exam_date']
    ]
]);

$conn->close();
?>
