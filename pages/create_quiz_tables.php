<?php
$conn = new mysqli("localhost", "root", "", "eduplatform");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create quiz_scores table
$sql = "CREATE TABLE IF NOT EXISTS quiz_scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    quiz_title VARCHAR(100) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    total_questions INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table quiz_scores created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 