<?php
session_start();
require_once '../database/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

// Get announcement ID from POST data
$announcement_id = isset($_POST['announcement_id']) ? (int)$_POST['announcement_id'] : 0;

if ($announcement_id <= 0) {
    echo json_encode(['error' => 'Invalid announcement ID']);
    exit;
}

try {
    // Get user ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION["username"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Insert read status
    $stmt = $conn->prepare("INSERT IGNORE INTO announcement_reads (user_id, announcement_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $announcement_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to mark announcement as read']);
    }
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}

// Close the database connection
$stmt->close();
$conn->close();
?> 