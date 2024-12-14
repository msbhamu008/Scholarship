<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db_connect.php';

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['class']) || !isset($data['phone'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Missing required fields'
    ]);
    exit;
}

$class = $data['class'];
$phone = $data['phone'];

try {
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT passcode FROM scholarship_registrations WHERE class = ? AND parent_phone = ?");
    $stmt->bind_param("ss", $class, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'passcode' => $row['passcode']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No registration found with the provided class and phone number'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred'
    ]);
}

$conn->close();
?>
