<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

// Function to get rankings for a subject
function getRankings($conn, $subject) {
    $rankings = [];
    
    // Get all unique quiz titles for the subject
    $stmt = $conn->prepare("SELECT DISTINCT quiz_title FROM quiz_scores WHERE subject = ?");
    $stmt->bind_param("s", $subject);
    $stmt->execute();
    $result = $stmt->get_result();
    $quizTitles = [];
    while ($row = $result->fetch_assoc()) {
        $quizTitles[] = $row['quiz_title'];
    }
    
    // For each quiz, get the top scores
    foreach ($quizTitles as $quizTitle) {
        $stmt = $conn->prepare("
            SELECT username, score, total_questions, created_at
            FROM quiz_scores 
            WHERE subject = ? AND quiz_title = ?
            ORDER BY score DESC, created_at ASC
            LIMIT 5
        ");
        $stmt->bind_param("ss", $subject, $quizTitle);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $quizRankings = [];
        while ($row = $result->fetch_assoc()) {
            $quizRankings[] = $row;
        }
        
        if (!empty($quizRankings)) {
            $rankings[$quizTitle] = $quizRankings;
        }
    }
    
    return $rankings;
}

// Get rankings for each subject
$mathRankings = getRankings($conn, "Mathematics");
$englishRankings = getRankings($conn, "English");
$scienceRankings = getRankings($conn, "Science");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Rankings - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
        }
        .ranking-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .ranking-title {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .ranking-list {
            list-style: none;
            padding: 0;
        }
        .ranking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .ranking-item:last-child {
            border-bottom: none;
        }
        .rank-number {
            font-weight: bold;
            color: #2c3e50;
            width: 30px;
        }
        .score {
            font-weight: bold;
        }
        .score-high {
            color: #27ae60;
        }
        .score-medium {
            color: #f39c12;
        }
        .score-low {
            color: #e74c3c;
        }
        .subject-header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
      <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
      <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#announcementModal"><i class="fas fa-bullhorn"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Student Rankings</h1>
        
        <!-- Mathematics Rankings -->
        <div class="subject-header">
            <h2>Mathematics</h2>
        </div>
        <div class="row">
            <?php foreach ($mathRankings as $quizTitle => $rankings): ?>
            <div class="col-md-6 mb-4">
                <div class="ranking-card">
                    <h3 class="ranking-title"><?php echo htmlspecialchars($quizTitle); ?></h3>
                    <ul class="ranking-list">
                        <?php foreach ($rankings as $index => $ranking): ?>
                        <li class="ranking-item">
                            <div class="d-flex align-items-center">
                                <span class="rank-number">#<?php echo $index + 1; ?></span>
                                <span class="ml-3"><?php echo htmlspecialchars($ranking['username']); ?></span>
                            </div>
                            <span class="score <?php 
                                $percentage = ($ranking['score'] / $ranking['total_questions']) * 100;
                                echo $percentage >= 80 ? 'score-high' : ($percentage >= 40 ? 'score-medium' : 'score-low');
                            ?>">
                                <?php echo $ranking['score']; ?>/<?php echo $ranking['total_questions']; ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- English Rankings -->
        <div class="subject-header">
            <h2>English</h2>
        </div>
        <div class="row">
            <?php foreach ($englishRankings as $quizTitle => $rankings): ?>
            <div class="col-md-6 mb-4">
                <div class="ranking-card">
                    <h3 class="ranking-title"><?php echo htmlspecialchars($quizTitle); ?></h3>
                    <ul class="ranking-list">
                        <?php foreach ($rankings as $index => $ranking): ?>
                        <li class="ranking-item">
                            <div class="d-flex align-items-center">
                                <span class="rank-number">#<?php echo $index + 1; ?></span>
                                <span class="ml-3"><?php echo htmlspecialchars($ranking['username']); ?></span>
                            </div>
                            <span class="score <?php 
                                $percentage = ($ranking['score'] / $ranking['total_questions']) * 100;
                                echo $percentage >= 80 ? 'score-high' : ($percentage >= 40 ? 'score-medium' : 'score-low');
                            ?>">
                                <?php echo $ranking['score']; ?>/<?php echo $ranking['total_questions']; ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Science Rankings -->
        <div class="subject-header">
            <h2>Science</h2>
        </div>
        <div class="row">
            <?php foreach ($scienceRankings as $quizTitle => $rankings): ?>
            <div class="col-md-6 mb-4">
                <div class="ranking-card">
                    <h3 class="ranking-title"><?php echo htmlspecialchars($quizTitle); ?></h3>
                    <ul class="ranking-list">
                        <?php foreach ($rankings as $index => $ranking): ?>
                        <li class="ranking-item">
                            <div class="d-flex align-items-center">
                                <span class="rank-number">#<?php echo $index + 1; ?></span>
                                <span class="ml-3"><?php echo htmlspecialchars($ranking['username']); ?></span>
                            </div>
                            <span class="score <?php 
                                $percentage = ($ranking['score'] / $ranking['total_questions']) * 100;
                                echo $percentage >= 80 ? 'score-high' : ($percentage >= 40 ? 'score-medium' : 'score-low');
                            ?>">
                                <?php echo $ranking['score']; ?>/<?php echo $ranking['total_questions']; ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 