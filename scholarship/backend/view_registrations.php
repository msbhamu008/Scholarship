<?php
// Include database connection
require_once 'db_connection.php';

// Pagination setup
$results_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $results_per_page;

// Search and filter functionality
$search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$filter_class = isset($_GET['class']) ? $conn->real_escape_string($_GET['class']) : '';
$filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

// Debugging: Log filtering parameters
error_log("Search Query: " . $search_query);
error_log("Filter Class: " . $filter_class);
error_log("Filter Status: " . $filter_status);

// Build WHERE clause for search and filter
$where_conditions = [];
if (!empty($search_query)) {
    $where_conditions[] = "(exam_id LIKE '%$search_query%' OR 
                            full_name LIKE '%$search_query%' OR 
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

// Count total results for pagination
$count_query = "SELECT COUNT(*) as total FROM scholarship_registrations $where_clause";
$count_result = $conn->query($count_query);
$total_results = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_results / $results_per_page);

// Fetch registrations with pagination
$query = "SELECT * FROM scholarship_registrations 
          $where_clause 
          ORDER BY registration_date DESC 
          LIMIT $results_per_page OFFSET $offset";
$result = $conn->query($query);

// Add this at the beginning of the file with other PHP code
if (isset($_POST['update_exam_settings'])) {
    $exam_date = $_POST['exam_date'];
    $is_active = $_POST['is_active'];
    
    $update_query = "UPDATE scholarship_exam_settings SET exam_date = ?, is_active = ?, updated_by = 'admin' WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sii", $exam_date, $is_active, $exam_settings['id']);
    
    if ($stmt->execute()) {
        echo "<script>alert('Exam settings updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating exam settings!');</script>";
    }
    $stmt->close();
}

// Query to get total registered students
$total_query = "SELECT COUNT(*) as total FROM scholarship_registrations";
$total_result = $conn->query($total_query);
$total_students = $total_result->fetch_assoc()['total'];

// Query to get total verified students
$verified_query = "SELECT COUNT(*) as total FROM scholarship_registrations WHERE status = 'verified'";
$verified_result = $conn->query($verified_query);
$verified_students = $verified_result->fetch_assoc()['total'];

// Query to get counts of appeared and not appeared students
$exam_status_query = "SELECT has_appeared, COUNT(*) as count FROM scholarship_registrations GROUP BY has_appeared";
$exam_status_result = $conn->query($exam_status_query);
$appeared_students = 0;
$not_appeared_students = 0;
while ($row = $exam_status_result->fetch_assoc()) {
    if ($row['has_appeared'] == 1) {
        $appeared_students = $row['count'];
    } else {
        $not_appeared_students = $row['count'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPARK Scholarship - Registrations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .registrations-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 30px;
        }
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }
        .sticky-header th {
            position: sticky;
            top: 0;
            background-color: #4ECDC4;
            color: white;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="container registrations-container">
        <h1 class="text-center mb-4">
            <i class="fas fa-list-alt"></i> SPARK Scholarship Registrations
        </h1>
        <div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-check"></i> Total Registered Students</h5>
                <p class="card-text"><?php echo $total_students; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-tie"></i> Verified Students</h5>
                <p class="card-text"><?php echo $verified_students; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-check"></i> Appeared</h5>
                <p class="card-text"><?php echo $appeared_students; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-dark bg-light">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user-times"></i> Not Appeared</h5>
                <p class="card-text"><?php echo $not_appeared_students; ?></p>
            </div>
        </div>
    </div>
</div>
        <!-- Search and Filter Form -->
        <form method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search by Name, School, City, Email" 
                           value="<?php echo htmlspecialchars($search_query); ?>">
                </div>
                <div class="col-md-2">
                    <select name="class" class="form-select">
                        <option value="">All Classes</option>
                        <option value="1" <?php echo $filter_class == '1' ? 'selected' : ''; ?>>Class 1</option>
                        <option value="2" <?php echo $filter_class == '2' ? 'selected' : ''; ?>>Class 2</option>
                        <option value="3" <?php echo $filter_class == '3' ? 'selected' : ''; ?>>Class 3</option>
                        <option value="4" <?php echo $filter_class == '4' ? 'selected' : ''; ?>>Class 4</option>
                        <option value="5" <?php echo $filter_class == '5' ? 'selected' : ''; ?>>Class 5</option>
                        <option value="6" <?php echo $filter_class == '6' ? 'selected' : ''; ?>>Class 6</option>
                        <option value="7" <?php echo $filter_class == '7' ? 'selected' : ''; ?>>Class 7</option>
                        <option value="8" <?php echo $filter_class == '8' ? 'selected' : ''; ?>>Class 8</option>
                        <option value="9" <?php echo $filter_class == '9' ? 'selected' : ''; ?>>Class 9</option>
                        <option value="10" <?php echo $filter_class == '10' ? 'selected' : ''; ?>>Class 10</option>
                        <option value="11" <?php echo $filter_class == '11' ? 'selected' : ''; ?>>Class 11</option>
                        <option value="12" <?php echo $filter_class == '12' ? 'selected' : ''; ?>>Class 12</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="pending" <?php echo $filter_status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="verified" <?php echo $filter_status == 'verified' ? 'selected' : ''; ?>>Verified</option>
                        <option value="rejected" <?php echo $filter_status == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
                <div class="col-md-2">
                    <button type="button" onclick="exportToCSV()" class="btn btn-success w-100">
                        <i class="fas fa-file-csv"></i> Export CSV
                    </button>
                </div>
            </div>
        </form>

        <!-- <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-check"></i> Total Registered Students</h5>
                        <p class="card-text"><?php echo $total_students; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-tie"></i> Verified Students</h5>
                        <p class="card-text"><?php echo $verified_students; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-check"></i> Appeared</h5>
                        <p class="card-text"><?php echo $appeared_students; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-times"></i> Not Appeared</h5>
                        <p class="card-text"><?php echo $not_appeared_students; ?></p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Registrations Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="registrationsTable">
                <thead class="sticky-header">
                    <tr>
                        <th>Exam ID</th>
                        <!--<th>ID</th>-->
                        <th>Full Name</th>
                        <th>Class</th>
                        <th>School Name</th>
                        <th>City</th>
                        <th>Parent Name</th>
                        <th>Parent Phone</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Exam Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['exam_id']) . "</td>";
                            // echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['school_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['parent_email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['parent_phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['registration_date']) . "</td>";
                            echo "<td>";
                            switch($row['status']) {
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
                            echo "</td>";
                            echo "<td>";
                            echo '<form method="POST" action="update_exam_status.php">';
                            echo '<select name="status" onchange="this.form.submit()">';
                            echo '<option value="1"' . ($row['has_appeared'] == 1 ? ' selected' : '') . '>Appeared</option>';
                            echo '<option value="0"' . ($row['has_appeared'] == 0 ? ' selected' : '') . '>Not Appeared</option>';
                            echo '</select>';
                            echo '<input type="hidden" name="application_id" value="' . $row['application_id'] . '">';
                            echo '</form>';
                            echo "</td>";
                            echo "<td>
                                <div class='btn-group' role='group'>";
                            echo "<button onclick='viewDetails(" . $row['id'] . ")' class='btn btn-sm btn-info' title='View Details'>
                                    <i class='fas fa-eye'></i>
                                </button>";
                            if ($row['status'] === 'pending') {
                                echo "<button onclick='updateStatus(" . $row['id'] . ", \"verified\")' class='btn btn-sm btn-success' title='Verify'>
                                        <i class='fas fa-check'></i>
                                    </button>
                                    <button onclick='updateStatus(" . $row['id'] . ", \"rejected\")' class='btn btn-sm btn-danger' title='Reject'>
                                        <i class='fas fa-times'></i>
                                    </button>";
                            }
                            echo "</div>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11' class='text-center'>No registrations found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Registration page navigation" class="mt-3">
            <ul class="pagination justify-content-center">
                <?php
                // Previous page link
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . 
                         "&search=" . urlencode($search_query) . 
                         "&class=" . urlencode($filter_class) . 
                         "&status=" . urlencode($filter_status) . "'>Previous</a></li>";
                }

                // Page numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active = $i == $page ? 'active' : '';
                    echo "<li class='page-item $active'><a class='page-link' href='?page=$i" . 
                         "&search=" . urlencode($search_query) . 
                         "&class=" . urlencode($filter_class) . 
                         "&status=" . urlencode($filter_status) . "'>$i</a></li>";
                }

                // Next page link
                if ($page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . 
                         "&search=" . urlencode($search_query) . 
                         "&class=" . urlencode($filter_class) . 
                         "&status=" . urlencode($filter_status) . "'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>

        <!-- Add this section for exam settings -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Exam Settings</h5>
            </div>
            <div class="card-body">
                <?php
                // Fetch current exam settings
                $exam_query = "SELECT * FROM scholarship_exam_settings ORDER BY id DESC LIMIT 1";
                $exam_result = $conn->query($exam_query);
                $exam_settings = $exam_result->fetch_assoc();
                ?>
                <form id="examSettingsForm" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Exam Date</label>
                                <input type="datetime-local" name="exam_date" class="form-control" 
                                    value="<?php echo date('Y-m-d\TH:i', strtotime($exam_settings['exam_date'])); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Exam Status</label>
                                <select name="is_active" class="form-select">
                                    <option value="0" <?php echo !$exam_settings['is_active'] ? 'selected' : ''; ?>>Inactive</option>
                                    <option value="1" <?php echo $exam_settings['is_active'] ? 'selected' : ''; ?>>Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update_exam_settings" class="btn btn-primary">Update Exam Settings</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Detailed View -->
    <div class="modal fade" id="registrationDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registration Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="registrationDetailsContent">
                    <!-- Details will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewDetails(id) {
            fetch(`get_registration_details.php?id=${id}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('registrationDetailsContent').innerHTML = html;
                    new bootstrap.Modal(document.getElementById('registrationDetailsModal')).show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading registration details');
                });
        }

        function updateStatus(id, status) {
            if (!confirm(`Are you sure you want to mark this registration as ${status}?`)) {
                return;
            }

            fetch('update_registration_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: id,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    location.reload(); // Reload to show updated status
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating status');
            });
        }

        function exportToCSV() {
            const urlParams = new URLSearchParams(window.location.search);
            window.location.href = `export_registrations.php?${urlParams.toString()}`;
        }
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>