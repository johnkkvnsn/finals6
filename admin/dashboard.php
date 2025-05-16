<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

// Get statistics
$stats = [
    'users' => 0,
    'announcements' => 0,
    'pdfs' => 0,
    'quizzes' => 0
];

// Get total users
$result = $conn->query("SELECT COUNT(*) as count FROM users");
if ($result) {
    $stats['users'] = $result->fetch_assoc()['count'];
}

// Get total announcements
$result = $conn->query("SELECT COUNT(*) as count FROM announcements");
if ($result) {
    $stats['announcements'] = $result->fetch_assoc()['count'];
}

// Get total PDFs
$result = $conn->query("SELECT COUNT(*) as count FROM pdf_files");
if ($result) {
    $stats['pdfs'] = $result->fetch_assoc()['count'];
}

// Get total quizzes
$result = $conn->query("SELECT COUNT(*) as count FROM quiz_scores");
if ($result) {
    $stats['quizzes'] = $result->fetch_assoc()['count'];
}

// Get recent announcements
$recent_announcements = [];
$result = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC LIMIT 5");
while ($row = $result->fetch_assoc()) {
    $recent_announcements[] = $row;
}

// Get recent PDFs
$recent_pdfs = [];
$result = $conn->query("SELECT * FROM pdf_files ORDER BY uploaded_at DESC LIMIT 5");
while ($row = $result->fetch_assoc()) {
    $recent_pdfs[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EduPlatform</title>
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
        .stat-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2.5em;
            color: #007bff;
            margin-bottom: 10px;
        }
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
        }
        .stat-label {
            color: #6c757d;
            font-size: 1.1em;
        }
        .recent-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .recent-card h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f8f9fa;
        }
        .recent-item {
            padding: 10px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        .recent-item:last-child {
            border-bottom: none;
        }
        .recent-item .title {
            color: #2c3e50;
            font-weight: 500;
        }
        .recent-item .date {
            color: #6c757d;
            font-size: 0.9em;
        }
        .welcome-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .welcome-section h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .welcome-section p {
            color: #6c757d;
            margin-bottom: 0;
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
                    <a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="users.php"><i class="fas fa-users"></i> Users</a>
                    <a href="rankings.php"><i class="fas fa-trophy"></i> Rankings</a>
                    <a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a>
                    <a href="upload.php"><i class="fas fa-file-upload"></i> Upload PDF</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["admin_username"]); ?>!</h2>
                    <p>Here's an overview of your educational platform.</p>
                </div>

                <!-- Statistics -->
                <div class="row">
                    <div class="col-md-3">
                        <a href="users.php" style="text-decoration: none;">
                            <div class="stat-card text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-number"><?php echo $stats['users']; ?></div>
                                <div class="stat-label">Total Users</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="announcements.php" style="text-decoration: none;">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="stat-number"><?php echo $stats['announcements']; ?></div>
                            <div class="stat-label">Announcements</div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="upload.php" style="text-decoration: none;">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="stat-number"><?php echo $stats['pdfs']; ?></div>
                            <div class="stat-label">PDF Files</div>
                        </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="recent-card">
                            <h3><i class="fas fa-bullhorn"></i> Recent Announcements</h3>
                            <?php foreach ($recent_announcements as $announcement): ?>
                                <div class="recent-item">
                                    <div class="title"><?php echo htmlspecialchars($announcement['title']); ?></div>
                                    <div class="date"><?php echo date('F j, Y g:i a', strtotime($announcement['created_at'])); ?></div>
                                </div>
                            <?php endforeach; ?>
                            <?php if (empty($recent_announcements)): ?>
                                <p class="text-muted">No recent announcements.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="recent-card">
                            <h3><i class="fas fa-file-pdf"></i> Recent PDFs</h3>
                            <?php foreach ($recent_pdfs as $pdf): ?>
                                <div class="recent-item">
                                    <div class="title"><?php echo htmlspecialchars($pdf['title']); ?></div>
                                    <div class="date"><?php echo date('F j, Y g:i a', strtotime($pdf['uploaded_at'])); ?></div>
                                </div>
                            <?php endforeach; ?>
                            <?php if (empty($recent_pdfs)): ?>
                                <p class="text-muted">No recent PDFs uploaded.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 