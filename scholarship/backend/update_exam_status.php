<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'] ?? '';
    $status = $_POST['status'] ?? '';

    if (!empty($application_id) && isset($status)) {
        // Update the exam status in the database
        $update_query = "UPDATE scholarship_registrations SET has_appeared = ? WHERE application_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param('is', $status, $application_id);

        if ($stmt->execute()) {
            // Redirect back to the registrations page with success message
            header('Location: view_registrations.php');
        } else {
            // Redirect back with error message
            header('Location: view_registrations.php?status=error');
        }
        $stmt->close();
    } else {
        // Redirect back with error message if parameters are missing
        header('Location: view_registrations.php?status=error');
    }
} else {
    // Redirect back if not a POST request
    header('Location: view_registrations.php');
}
?>
