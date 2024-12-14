<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include database connection
require_once 'db_connection.php';

// Get JSON input
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validate input
$id = isset($data['id']) ? (int)$data['id'] : 0;
$status = isset($data['status']) ? $data['status'] : '';

// Validate status
$allowed_statuses = ['pending', 'verified', 'rejected'];
if (!in_array($status, $allowed_statuses)) {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Invalid status'
    ]);
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("UPDATE scholarship_registrations SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo json_encode([
        'status' => 'success', 
        'message' => 'Registration status updated successfully'
    ]);
} else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Failed to update registration status'
    ]);
}

$stmt->close();
$conn->close();
?>
