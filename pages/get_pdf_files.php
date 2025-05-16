<?php
session_start();
require_once '../database/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

// Get subject from query parameter
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

if (empty($subject)) {
    echo json_encode(['error' => 'Subject parameter is required']);
    exit;
}

try {
    // Debug: Log the subject being queried
    error_log("Querying PDF files for subject: " . $subject);

    // First, let's see all records in the pdf_files table
    $allRecords = $conn->query("SELECT * FROM pdf_files");
    error_log("All PDF records in database: " . json_encode($allRecords->fetch_all(MYSQLI_ASSOC)));

    // Prepare SQL statement to get PDF files for the specified subject
    $stmt = $conn->prepare("
        SELECT id, title, description, file_name, file_path, uploaded_at
        FROM pdf_files
        WHERE subject = ?
        ORDER BY uploaded_at DESC
    ");
    
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    $stmt->bind_param("s", $subject);
    
    if (!$stmt->execute()) {
        throw new Exception("Failed to execute statement: " . $stmt->error);
    }

    $result = $stmt->get_result();
    
    // Debug: Log the number of rows found
    error_log("Number of PDF files found for subject {$subject}: " . $result->num_rows);
    
    $files = [];
    while ($row = $result->fetch_assoc()) {
        // Debug: Log each file being processed
        error_log("Processing file: " . json_encode($row));
        
        // Construct the full file path
        $fullPath = '../uploads/pdfs/' . $row['file_path'];
        error_log("Checking file at path: " . $fullPath);
        
        // Check if file actually exists
        if (file_exists($fullPath)) {
            error_log("File exists at path: " . $fullPath);
            $files[] = [
                'id' => $row['id'],
                'title' => htmlspecialchars($row['title']),
                'description' => htmlspecialchars($row['description']),
                'filename' => htmlspecialchars($row['file_name']),
                'filepath' => 'uploads/pdfs/' . htmlspecialchars($row['file_path']), // Path relative to pages directory
                'uploaded_at' => $row['uploaded_at']
            ];
        } else {
            // Debug: Log if file doesn't exist
            error_log("File not found at path: " . $fullPath);
        }
    }
    
    // Debug: Log the final files array
    error_log("Final files array for subject {$subject}: " . json_encode($files));
    
    // Return files as JSON
    echo json_encode($files);
    
} catch (Exception $e) {
    error_log("PDF Files Error: " . $e->getMessage());
    echo json_encode(['error' => 'Error loading learning materials: ' . $e->getMessage()]);
}

// Close the database connection
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?> 