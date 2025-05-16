<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["username"])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

require_once '../database/db_connect.php';

header('Content-Type: application/json');

try {
    $username = $_SESSION["username"];
    
    // Debug: Log the username and database connection
    error_log("Fetching scores for user: " . $username);
    error_log("Database connection status: " . ($conn->connect_error ? "Failed" : "Success"));
    
    // Get all quiz scores for the user
    $stmt = $conn->prepare("SELECT quiz_title, score, total_questions, subject FROM quiz_scores WHERE username = ? ORDER BY created_at DESC");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    if (!$result) {
        throw new Exception("Get result failed: " . $stmt->error);
    }
    
    // Debug: Log all raw results
    $allResults = [];
    while ($row = $result->fetch_assoc()) {
        $allResults[] = $row;
        error_log("Raw database row: " . json_encode($row));
    }
    
    // Debug: Log total number of results
    error_log("Total number of quiz scores found: " . count($allResults));
    
    // Reset the result pointer
    $result->data_seek(0);
    
    $scores = [];
    while ($row = $result->fetch_assoc()) {
        // Map quiz titles to quiz types based on subject
        $quizType = '';
        $subject = strtolower($row['subject']);
        $quizTitle = strtolower($row['quiz_title']);
        
        error_log("Processing quiz - Subject: $subject, Title: $quizTitle");
        
        // Define quiz title mappings
        $quizMappings = [
            'science' => [
                'the five senses' => 'senses',
                'senses' => 'senses',
                'plants and animals' => 'plants',
                'plants' => 'plants',
                'weather and seasons' => 'weather',
                'weather' => 'weather',
                'human body' => 'body',
                'body' => 'body',
                'states of matter' => 'matter',
                'matter' => 'matter'
            ],
            'english' => [
                'alphabet and phonics' => 'phonics',
                'phonics' => 'phonics',
                'basic grammar' => 'grammar',
                'grammar' => 'grammar',
                'reading short stories' => 'reading_stories',
                'reading_stories' => 'reading_stories',
                'spelling and vocabulary' => 'spelling_and_vocabulary',
                'spelling_and_vocabulary' => 'spelling_and_vocabulary',
                'sentence formation' => 'sentence_formation',
                'sentence_formation' => 'sentence_formation'
            ],
            'mathematics' => [
                'numbers and counting' => 'numbers_counting',
                'numbers_counting' => 'numbers_counting',
                'basic addition and subtraction' => 'basic_addition_subtraction',
                'basic_addition_subtraction' => 'basic_addition_subtraction',
                'multiplication and division' => 'multiplication_division',
                'multiplication_division' => 'multiplication_division',
                'shapes and patterns' => 'shapes_patterns',
                'shapes_patterns' => 'shapes_patterns',
                'fractions (basic)' => 'fractions_basic',
                'fractions basic' => 'fractions_basic',
                'fractions_basic' => 'fractions_basic'
            ]
        ];
        
        // Debug: Log available mappings for this subject
        if (isset($quizMappings[$subject])) {
            error_log("Available mappings for subject '$subject': " . json_encode($quizMappings[$subject]));
        } else {
            error_log("No mappings found for subject '$subject'");
        }
        
        // Look up the quiz type using the mappings
        if (isset($quizMappings[$subject]) && isset($quizMappings[$subject][$quizTitle])) {
            $quizType = $quizMappings[$subject][$quizTitle];
            error_log("Successfully mapped to quiz type: $quizType");
        } else {
            error_log("No quiz type mapping found for subject: $subject, title: $quizTitle");
            // Try to find a partial match
            if (isset($quizMappings[$subject])) {
                foreach ($quizMappings[$subject] as $key => $value) {
                    if (strpos($quizTitle, $key) !== false || strpos($key, $quizTitle) !== false) {
                        $quizType = $value;
                        error_log("Found partial match: $key => $value");
                        break;
                    }
                }
            }
        }
        
        if ($quizType) {
            $scores[$quizType] = [
                'score' => (int)$row['score'],
                'total' => (int)$row['total_questions']
            ];
            error_log("Added score for $quizType: " . json_encode($scores[$quizType]));
        }
    }
    
    // Debug: Log the final scores
    error_log("Final scores array: " . json_encode($scores));
    
    echo json_encode($scores);
} catch (Exception $e) {
    error_log("Error in get_scores.php: " . $e->getMessage());
    echo json_encode(['error' => $e->getMessage()]);
}

$stmt->close();
$conn->close();
?> 