<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include database connection
require_once 'db_connection.php';

// Function to generate random application ID (4 digits)
function generateApplicationId() {
    return str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

// Function to generate random passcode (6 digits)
function generatePasscode() {
    return str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
}

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to log errors
function logError($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . "\n", 3, 'registration_errors.log');
}

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON input
    $json = file_get_contents('php://input');
    
    // Log raw input for debugging
    logError("Raw JSON Input: " . $json);
    
    // Validate JSON
    if (empty($json)) {
        logError("Empty JSON input received");
        http_response_code(400);
        echo json_encode([
            'status' => 'error', 
            'message' => 'No data received'
        ]);
        exit;
    }
    
    $data = json_decode($json, true);
    
    // Check JSON decoding
    if (json_last_error() !== JSON_ERROR_NONE) {
        logError("JSON Parsing Error: " . json_last_error_msg());
        http_response_code(400);
        echo json_encode([
            'status' => 'error', 
            'message' => 'Invalid JSON: ' . json_last_error_msg()
        ]);
        exit;
    }

    // Validate input
    $errors = [];

    $full_name = sanitize_input($data['full_name'] ?? '');
    $class = sanitize_input($data['class'] ?? '');
    $school_name = sanitize_input($data['school_name'] ?? '');
    $city = sanitize_input($data['city'] ?? '');
    $parent_email = sanitize_input($data['parent_email'] ?? ''); 
    $parent_phone = sanitize_input($data['parent_phone'] ?? '');

    // Generate credentials
    $application_id = generateApplicationId();
    $passcode = generatePasscode();

    // Validation checks
    if (empty($full_name)) $errors[] = "Full name is required";
    if (empty($class)) $errors[] = "Class is required";
    if (empty($school_name)) $errors[] = "School name is required";
    if (empty($city)) $errors[] = "City is required";
    if (empty($parent_email)) $errors[] = "Parent name is required"; 
    if (!preg_match('/^[0-9]{10}$/', $parent_phone)) $errors[] = "Invalid phone number";

    // Check if the phone number is already registered
    $checkQuery = "SELECT id FROM scholarship_registrations WHERE parent_phone = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $parent_phone);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 20) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'This phone number is already registered with more than 20 students.'
        ]);
        exit;
    }

    // Define starting numbers for exam IDs
    $starting_numbers = [
        '1' => 1001,
        '2' => 2001,
        '3' => 3001,
        '4' => 4001,
        '5' => 5001,
        '6' => 6001,
        '7' => 7001,
        '8' => 8001,
        '9' => 9001,
        '10' => 10001,
        '11' => 11001,
        '12' => 12001,
    ];

    // Fetch the last used exam ID for the class
    $lastIdQuery = "SELECT exam_id FROM scholarship_registrations WHERE class = ? ORDER BY exam_id DESC LIMIT 1";
    $lastIdStmt = $conn->prepare($lastIdQuery);
    $lastIdStmt->bind_param("s", $class);
    $lastIdStmt->execute();
    $lastIdResult = $lastIdStmt->get_result();

    // Generate new exam ID
    if ($lastIdResult->num_rows > 0) {
        $lastIdRow = $lastIdResult->fetch_assoc();
        $exam_id = $lastIdRow['exam_id'] + 1;
    } else {
        $exam_id = $starting_numbers[$class];
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        try {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO scholarship_registrations 
                (full_name, class, school_name, city, parent_email, parent_phone, application_id, passcode, exam_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->bind_param("sssssssss", 
                $full_name, $class, $school_name, $city, $parent_email, $parent_phone, $application_id, $passcode, $exam_id);

            if ($stmt->execute()) {
                http_response_code(201);
                echo json_encode([
                    'status' => 'success', 
                    'message' => 'Registration successful!',
                    'registration_id' => $stmt->insert_id,
                    'credentials' => [
                        'application_id' => $application_id,
                        'username' => $parent_phone,
                        'passcode' => $passcode,
                        'exam_id' => $exam_id
                    ]
                ]);
            } else {
                logError("Database Insert Error: " . $stmt->error);
                http_response_code(500);
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Registration failed: ' . $stmt->error
                ]);
            }

            $stmt->close();
        } catch (Exception $e) {
            logError("Unexpected Error: " . $e->getMessage());
            http_response_code(500);
            echo json_encode([
                'status' => 'error', 
                'message' => 'An unexpected error occurred'
            ]);
        }
    } else {
        // Validation failed
        logError("Validation Errors: " . implode(', ', $errors));
        http_response_code(400);
        echo json_encode([
            'status' => 'error', 
            'errors' => $errors
        ]);
    }

    $conn->close();
} else {
    // Not a POST request
    http_response_code(405);
    echo json_encode([
        'status' => 'error', 
        'message' => 'Method Not Allowed'
    ]);
}
?>
