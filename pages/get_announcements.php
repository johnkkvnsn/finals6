<?php
session_start();
require_once '../database/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

// Get user ID
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION["username"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$user_id = $user['id'];

// Get subject from query parameter
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

if (empty($subject)) {
    echo json_encode(['error' => 'Subject parameter is required']);
    exit;
}

try {
    // Prepare SQL statement to get announcements for the specified subject and general announcements
    $stmt = $conn->prepare("
        SELECT a.id, a.title, a.content, a.created_at, 
               CASE WHEN ar.id IS NULL THEN 0 ELSE 1 END as is_read
        FROM announcements a
        LEFT JOIN announcement_reads ar ON a.id = ar.announcement_id AND ar.user_id = ?
        WHERE a.subject = ? OR a.subject = 'general'
        ORDER BY a.created_at DESC
    ");
    $stmt->bind_param("is", $user_id, $subject);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $announcements = [];
    while ($row = $result->fetch_assoc()) {
        $announcements[] = [
            'id' => $row['id'],
            'title' => htmlspecialchars($row['title']),
            'content' => htmlspecialchars($row['content']),
            'created_at' => $row['created_at'],
            'is_read' => (bool)$row['is_read']
        ];
    }
    
    // Return announcements as JSON
    echo json_encode($announcements);
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}

// Close the database connection
$stmt->close();
$conn->close();
?> 