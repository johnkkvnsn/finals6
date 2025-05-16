<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

// Handle announcement submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['announcement'])) {
    $announcement = trim($_POST['announcement']);
    $title = trim($_POST['title']);
    $subject = trim($_POST['subject']);
    
    if (!empty($announcement) && !empty($title) && !empty($subject)) {
        $stmt = $conn->prepare("INSERT INTO announcements (title, content, subject, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $title, $announcement, $subject);
        
        if ($stmt->execute()) {
            $success_message = "Announcement sent successfully!";
        } else {
            $error_message = "Error sending announcement. Please try again.";
        }
    }
}

// Get all announcements
$announcements = [];
$result = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    $announcements[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Announcements - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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
        .announcement-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .announcement-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
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
                    <a href="users.php"><i class="fas fa-users"></i> Users</a>
                    <a href="rankings.php"><i class="fas fa-trophy"></i> Rankings</a>
                    <a href="announcements.php" class="active"><i class="fas fa-bullhorn"></i> Announcements</a>
                    <a href="upload.php"><i class="fas fa-file-upload"></i> Upload PDF</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <h2 class="mb-4">Send Announcements</h2>

                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <!-- Announcement Form -->
                <div class="announcement-form">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="title">Announcement Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select class="form-control" id="subject" name="subject" required>
                                <option value="english">English</option>
                                <option value="math">Math</option>
                                <option value="science">Science</option>
                                <option value="general">General</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="announcement">Announcement Content</label>
                            <textarea class="form-control" id="announcement" name="announcement" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Announcement</button>
                    </form>
                </div>

                <!-- Previous Announcements -->
                <h3 class="mb-4">Previous Announcements</h3>
                <?php foreach ($announcements as $announcement): ?>
                    <div class="announcement-card">
                        <h4><?php echo htmlspecialchars($announcement['title']); ?></h4>
                        <p class="text-muted">Posted on: <?php echo date('F j, Y g:i a', strtotime($announcement['created_at'])); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($announcement['content'])); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 