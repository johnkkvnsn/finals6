<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "eduplatform");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// All correct answers for all quizzes
$all_answers = [
    "The Five Senses" => [
        'q1' => 'b',
        'q2' => 'c',
        'q3' => 'c',
        'q4' => 'b',
        'q5' => 'b',
        'q6' => 'c',
        'q7' => 'c',
        'q8' => 'a',
        'q9' => 'd',
        'q10' => 'c'
    ],
    "Plants and Animals" => [
        'q1' => 'b',  // Correct answers for Plants and Animals
        'q2' => 'c',
        'q3' => 'c',
        'q4' => 'b',
        'q5' => 'b',
        'q6' => 'd',
        'q7' => 'd',
        'q8' => 'c',
        'q9' => 'b  ',
        'q10' => 'd'
    ],
    "Weather and Seasons" => [
        'q1' => 'b',  // Correct answers for Plants and Animals
        'q2' => 'c',
        'q3' => 'd',
        'q4' => 'b',
        'q5' => 'c',
        'q6' => 'd',
        'q7' => 'b',
        'q8' => 'd',
        'q9' => 'b',
        'q10' => 'c'
    ],
    "Human Body" => [
        'q1' => 'c',  // Correct answers for Plants and Animals
        'q2' => 'b',
        'q3' => 'c',
        'q4' => 'c',
        'q5' => 'b',
        'q6' => 'c',
        'q7' => 'b',
        'q8' => 'c',
        'q9' => 'c',
        'q10' => 'b'
    ],
    "States of Matter" => [
        'q1' => 'a',  // Correct answers for Plants and Animals
        'q2' => 'b',
        'q3' => 'd',
        'q4' => 'c',
        'q5' => 'b',
        'q6' => 'a',
        'q7' => 'd',
        'q8' => 'b',
        'q9' => 'b',
        'q10' => 'c'
    ]
    // Add other quizzes as needed
];

$quiz_title = $_POST['quiz_title'] ?? '';
$subject = $_POST['subject'] ?? '';

if (!isset($all_answers[$quiz_title])) {
    die("Invalid quiz: $quiz_title not found.");
}
$answers = $all_answers[$quiz_title];

$score = 0;
foreach ($answers as $q => $correct) {
    if (isset($_POST[$q]) && $_POST[$q] === $correct) {
        $score++;
    }
}

$username = $_SESSION['username'];
$total = count($answers);

// Save the score and subject to the database
$stmt = $conn->prepare("INSERT INTO quiz_scores (username, quiz_title, subject, score, total_questions) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $username, $quiz_title, $subject, $score, $total);
$stmt->execute();
$stmt->close();

// Store the score in session for later use
$_SESSION['score'] = $score;

// Redirect to result page
header("Location: quiz_result.php");
exit();
?>
