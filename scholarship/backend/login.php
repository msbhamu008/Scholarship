<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db_connection.php';

// Get JSON input
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid input'
    ]);
    exit;
}

$username = $data['username'] ?? ''; // This will be the phone number
$passcode = $data['passcode'] ?? '';

// Validate credentials using phone number and passcode
$stmt = $conn->prepare("SELECT * FROM scholarship_registrations WHERE exam_id = ? AND passcode = ?");
$stmt->bind_param("ss", $username, $passcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Login successful',
        'class' => $user['class'],
        'application_id' => $user['application_id'],
        'exam_id' => $user['exam_id']
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid credentials'
    ]);
}

$stmt->close();
$conn->close();
?>
