<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

// Get all users
$users = [];
$result = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Handle user deletion if requested
if (isset($_POST['delete_user'])) {
    $username = $conn->real_escape_string($_POST['username']);
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Delete quiz scores
        $conn->query("DELETE FROM quiz_scores WHERE username = '$username'");
        
        // Delete the user
        $delete_result = $conn->query("DELETE FROM users WHERE username = '$username'");
        
        if ($delete_result) {
            // If everything is successful, commit the transaction
            $conn->commit();
            header("Location: users.php?message=User and their quiz scores deleted successfully");
        } else {
            throw new Exception("Failed to delete user: " . $conn->error);
        }
        exit;
    } catch (Exception $e) {
        // If there's an error, rollback the transaction
        $conn->rollback();
        header("Location: users.php?error=" . urlencode($e->getMessage()));
        exit;
    }
}

// Display success/error messages if any
$message = isset($_GET['message']) ? $_GET['message'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .sidebar .active {
            background: #007bff;
        }
        .main-content {
            padding: 20px;
        }
        .page-header {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .page-header h2 {
            color: #2c3e50;
            margin-bottom: 0;
        }
        .users-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .table thead th {
            border-top: none;
            border-bottom: 2px solid #dee2e6;
            color: #2c3e50;
            font-weight: 600;
        }
        .table td {
            vertical-align: middle;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .view-btn {
            background: #007bff;
        }
        .delete-btn {
            background: #dc3545;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8em;
            font-weight: 500;
        }
        .status-active {
            background: #28a745;
            color: white;
        }
        .status-inactive {
            background: #dc3545;
            color: white;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .search-box input {
            border-radius: 20px;
            padding-left: 20px;
            border: 1px solid #dee2e6;
        }
        .search-box input:focus {
            box-shadow: none;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h3 class="text-center mb-4">Admin Panel</h3>
                <nav>
                    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="users.php" class="active"><i class="fas fa-users"></i> Users</a>
                    <a href="rankings.php"><i class="fas fa-trophy"></i> Rankings</a>
                    <a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a>
                    <a href="upload.php"><i class="fas fa-file-upload"></i> Upload PDF</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="page-header">
                    <h2><i class="fas fa-users"></i> User Management</h2>
                </div>

                <?php if ($message): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="users-table">
                    <!-- Search Box -->
                    <div class="row search-box">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search users...">
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Joined Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar mr-3">
                                                    <?php echo strtoupper(substr($user['username'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <div class="font-weight-bold"><?php echo htmlspecialchars($user['username']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td>
                                            <span class="status-badge status-active">
                                                Active
                                            </span>
                                        </td>
                                        <td><?php echo date('F j, Y', strtotime($user['created_at'])); ?></td>
                                        <td>
                                            <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                <input type="hidden" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                                <button type="submit" name="delete_user" class="action-btn delete-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const username = row.querySelector('.font-weight-bold').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                
                if (username.includes(searchText) || email.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // View user function (to be implemented)
        function viewUser(userId) {
            // Implement user details view functionality
            alert('View user details for ID: ' + userId);
        }
    </script>
</body>
</html> 