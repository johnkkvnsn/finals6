<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

require_once '../database/db_connect.php';

// Get quiz type and subject from request
$quizType = isset($_GET['quiz_type']) ? $_GET['quiz_type'] : '';
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

if (empty($quizType) || empty($subject)) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Quiz type and subject are required']);
    exit;
}

// Map quiz types to full titles for each subject
$quiz_type_to_title = [
    // Mathematics
    'numbers_counting' => 'Numbers and Counting',
    'basic_addition_subtraction' => 'Basic Addition and Subtraction',
    'multiplication_division' => 'Multiplication and Division',
    'shapes_patterns' => 'Shapes and Patterns',
    'fractions_basic' => 'Fractions Basic',
    
    // English
    'phonics' => 'Alphabet and Phonics',
    'grammar' => 'Basic Grammar',
    'reading_stories' => 'Reading Short Stories',
    'spelling_and_vocabulary' => 'Spelling and Vocabulary',
    'sentence_formation' => 'Sentence Formation',
    
    // Science
    'senses' => 'The Five Senses',
    'plants' => 'Plants and Animals',
    'weather' => 'Weather and Seasons',
    'body' => 'Human Body',
    'matter' => 'States of Matter',
];

// Get the full title for the quiz type
$quizTitle = isset($quiz_type_to_title[$quizType]) ? $quiz_type_to_title[$quizType] : $quizType;

// Map subject to full name
$subject_mapping = [
    'math' => 'Mathematics',
    'english' => 'English',
    'science' => 'Science'
];

$fullSubject = isset($subject_mapping[$subject]) ? $subject_mapping[$subject] : $subject;

// Prepare and execute the query
$stmt = $conn->prepare("
    SELECT username, score, total_questions, created_at
    FROM quiz_scores 
    WHERE subject = ? AND quiz_title = ?
    ORDER BY score DESC, created_at ASC
    LIMIT 10
");

$stmt->bind_param("ss", $fullSubject, $quizTitle);
$stmt->execute();
$result = $stmt->get_result();

$rankings = [];
while ($row = $result->fetch_assoc()) {
    $rankings[] = [
        'username' => $row['username'],
        'score' => $row['score'],
        'total_questions' => $row['total_questions'],
        'created_at' => $row['created_at']
    ];
}

$stmt->close();
$conn->close();

// Send response
header('Content-Type: application/json');
echo json_encode($rankings); 