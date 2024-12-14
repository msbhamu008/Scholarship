<?php
// Database Configuration
$host = '118.139.181.71';
$db_name = 'sips';
$username = 'adminsips';
$password = '(Admin@123)';

try {
    // Create database connection
    $conn = new mysqli($host, $username, $password, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8
    $conn->set_charset("utf8");
} catch(Exception $e) {
    // Handle connection error
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
