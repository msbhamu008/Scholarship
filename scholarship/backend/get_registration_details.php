<?php
// Include database connection
require_once 'db_connection.php';

// Get registration ID from GET parameter
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM scholarship_registrations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $registration = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-md-6">
            <h5>Personal Details</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <td><?php echo htmlspecialchars($registration['full_name']); ?></td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><?php echo htmlspecialchars($registration['class']); ?></td>
                </tr>
                <tr>
                    <th>School Name</th>
                    <td><?php echo htmlspecialchars($registration['school_name']); ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo htmlspecialchars($registration['city']); ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h5>Contact Information</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Parent Name</th>
                    <td><?php echo htmlspecialchars($registration['parent_email']); ?></td>
                </tr>
                <tr>
                    <th>Parent Phone</th>
                    <td><?php echo htmlspecialchars($registration['parent_phone']); ?></td>
                </tr>
                <tr>
                    <th>Registration Date</th>
                    <td><?php echo htmlspecialchars($registration['registration_date']); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <?php 
                        switch($registration['status']) {
                            case 'pending':
                                echo '<span class="badge bg-warning">Pending</span>';
                                break;
                            case 'verified':
                                echo '<span class="badge bg-success">Verified</span>';
                                break;
                            case 'rejected':
                                echo '<span class="badge bg-danger">Rejected</span>';
                                break;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
} else {
    echo "<p class='text-danger'>Registration not found.</p>";
}

$stmt->close();
$conn->close();
?>
