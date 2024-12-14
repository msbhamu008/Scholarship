<?php
// Include database connection
require_once 'db_connection.php';

// Search and filter functionality
$search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$filter_class = isset($_GET['class']) ? $conn->real_escape_string($_GET['class']) : '';
$filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

// Build WHERE clause for search and filter
$where_conditions = [];
if (!empty($search_query)) {
    $where_conditions[] = "(full_name LIKE '%$search_query%' OR 
                            school_name LIKE '%$search_query%' OR 
                            city LIKE '%$search_query%' OR 
                            parent_email LIKE '%$search_query%')";
}
if (!empty($filter_class)) {
    $where_conditions[] = "class = '$filter_class'";
}
if (!empty($filter_status)) {
    $where_conditions[] = "status = '$filter_status'";
}
$where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';

// Fetch registrations
$query = "SELECT * FROM registrations $where_clause ORDER BY registration_date DESC";
$result = $conn->query($query);

// Prepare CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="spark_scholarship_registrations_' . date('Y-m-d_H-i-s') . '.csv"');

// Open file output
$output = fopen('php://output', 'w');

// CSV Headers
fputcsv($output, [
    'Registration ID', 
    'Full Name', 
    'Class', 
    'School Name', 
    'City', 
    'Parent Email', 
    'Parent Phone', 
    'Registration Date', 
    'Status'
]);

// Output data rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['full_name'],
        $row['class'],
        $row['school_name'],
        $row['city'],
        $row['parent_email'],
        $row['parent_phone'],
        $row['registration_date'],
        $row['status']
    ]);
}

// Close file output
fclose($output);

// Close database connection
$conn->close();
exit();
?>
