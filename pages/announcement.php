<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

// Fetch announcements from the database
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
    <title>Announcements - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
        }
        .announcement-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .announcement-header {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .announcement-title {
            color: #2c3e50;
            font-size: 1.4rem;
            font-weight: 600;
        }
        .announcement-date {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .announcement-content {
            color: #2c3e50;
            line-height: 1.6;
        }
        .no-announcements {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .announcement-icon {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
                <li class="nav-item"><a class="nav-link active" href="announcement.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Announcements</h1>
        
        <?php if (empty($announcements)): ?>
            <div class="no-announcements">
                <i class="fas fa-bullhorn announcement-icon"></i>
                <h3>No Announcements Yet</h3>
                <p class="text-muted">Check back later for updates from the admin.</p>
            </div>
        <?php else: ?>
            <?php foreach ($announcements as $announcement): ?>
                <div class="announcement-card">
                    <div class="announcement-header">
                        <h2 class="announcement-title"><?php echo htmlspecialchars($announcement['title']); ?></h2>
                        <div class="announcement-date">
                            <i class="far fa-clock"></i> 
                            <?php echo date('F j, Y g:i A', strtotime($announcement['created_at'])); ?>
                        </div>
                    </div>
                    <div class="announcement-content">
                        <?php echo nl2br(htmlspecialchars($announcement['content'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 