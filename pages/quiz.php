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

// Handle quiz submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quiz_title = $_POST['quiz_title'] ?? '';
    $subject = $_POST['subject'] ?? '';
    
    // All correct answers for all quizzes
    $all_answers = [
        "The Five Senses" => [
            'q1' => 'b', 'q2' => 'c', 'q3' => 'c', 'q4' => 'b', 'q5' => 'b',
            'q6' => 'c', 'q7' => 'c', 'q8' => 'a', 'q9' => 'd', 'q10' => 'c'
        ],
        "Plants and Animals" => [
            'q1' => 'b', 'q2' => 'c', 'q3' => 'c', 'q4' => 'b', 'q5' => 'b',
            'q6' => 'd', 'q7' => 'd', 'q8' => 'c', 'q9' => 'b', 'q10' => 'd'
        ],
        "Weather and Seasons" => [
            'q1' => 'b', 'q2' => 'c', 'q3' => 'd', 'q4' => 'b', 'q5' => 'c',
            'q6' => 'd', 'q7' => 'b', 'q8' => 'd', 'q9' => 'b', 'q10' => 'c'
        ],
        "Human Body" => [
            'q1' => 'c', 'q2' => 'b', 'q3' => 'c', 'q4' => 'c', 'q5' => 'b',
            'q6' => 'c', 'q7' => 'b', 'q8' => 'c', 'q9' => 'c', 'q10' => 'b'
        ],
        "States of Matter" => [
            'q1' => 'a', 'q2' => 'b', 'q3' => 'd', 'q4' => 'c', 'q5' => 'b',
            'q6' => 'a', 'q7' => 'd', 'q8' => 'b', 'q9' => 'b', 'q10' => 'c'
        ],
        "Alphabet and Phonics" => [
            'q1' => 'b', 
            'q2' => 'c', 
            'q3' => 'a', 
            'q4' => 'b', 
            'q5' => 'c', 
            'q6' => 'c', 
            'q7' => 'b', 
            'q8' => 'c', 
            'q9' => 'b', 
            'q10' => 'a'
        ],
        "Basic Grammar" => [
            'q1' => 'c', 
            'q2' => 'a', 
            'q3' => 'b', 
            'q4' => 'd', 
            'q5' => 'a', 
            'q6' => 'b', 
            'q7' => 'a', 
            'q8' => 'c', 
            'q9' => 'd', 
            'q10' => 'c'
        ],
        "Reading Short Stories" => [
            'q1' => 'a',
            'q2' => 'b',
            'q3' => 'a',
            'q4' => 'c',
            'q5' => 'b',
            'q6' => 'a',
            'q7' => 'b',
            'q8' => 'c',
            'q9' => 'c',
            'q10' => 'b'
        ],
        "Spelling and Vocabulary" => [
            'q1' => 'b',
            'q2' => 'b',
            'q3' => 'b',
            'q4' => 'b',
            'q5' => 'b',
            'q6' => 'a',
            'q7' => 'd',
            'q8' => 'd',
            'q9' => 'c',
            'q10' => 'a'
        ],
        "Sentence Formation" => [
            'q1' => 'b',
            'q2' => 'a',
            'q3' => 'a',
            'q4' => 'b',
            'q5' => 'a',
            'q6' => 'c',
            'q7' => 'a',
            'q8' => 'a',
            'q9' => 'b',
            'q10' => 'c'
        ],
        "Numbers and Counting" => [
            'q1' => 'b',
            'q2' => 'b',
            'q3' => 'c',
            'q4' => 'd',
            'q5' => 'b',
            'q6' => 'a',
            'q7' => 'b',
            'q8' => 'b',
            'q9' => 'b',
            'q10' => 'c'
        ],
        "Basic Addition and Subtraction" => [
            'q1' => 'b',
            'q2' => 'a',
            'q3' => 'a',
            'q4' => 'b',
            'q5' => 'd',
            'q6' => 'a',
            'q7' => 'a',
            'q8' => 'b',
            'q9' => 'b',
            'q10' => 'b'
        ],
        "Multiplication and Division" => [
            'q1' => 'b',
            'q2' => 'c',
            'q3' => 'b',
            'q4' => 'c',
            'q5' => 'b',
            'q6' => 'b',
            'q7' => 'c',
            'q8' => 'c',
            'q9' => 'a',
            'q10' => 'b'
        ],
        "Shapes and Patterns" => [
           'q1' => 'c',
            'q2' => 'b',
            'q3' => 'c',
            'q4' => 'c',
            'q5' => 'b',
            'q6' => 'c',
            'q7' => 'b',
            'q8' => 'b',
            'q9' => 'b',
            'q10' => 'c'
        ],
        "Fractions Basic" => [
            'q1' => 'b',
            'q2' => 'b',
            'q3' => 'c',
            'q4' => 'c',
            'q5' => 'c',
            'q6' => 'a',
            'q7' => 'a',
            'q8' => 'd',
            'q9' => 'c',
            'q10' => 'b'
        ]


    ];

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

    // Save the score to the database
    $stmt = $conn->prepare("INSERT INTO quiz_scores (username, quiz_title, subject, score, total_questions) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $username, $quiz_title, $subject, $score, $total);
    $stmt->execute();
    $stmt->close();

    // Store the score in session for the result page
    $_SESSION['score'] = $score;
    $_SESSION['total_questions'] = $total;
    $_SESSION['quiz_title'] = $quiz_title;
    $_SESSION['subject'] = $subject;

    // Redirect to quiz result page
    header("Location: quiz_result.php");
    exit();
}

// Get quiz type from URL parameter
$quiz_type = $_GET['type'] ?? '';

// Quiz data
$quizzes = [
    'senses' => [
        'title' => 'The Five Senses',
        'subject' => 'Science',
        'questions' => [
            [
                'text' => '1. Which sense organ helps us see colors and shapes?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Ears'],
                    ['value' => 'b', 'text' => 'Eyes'],
                    ['value' => 'c', 'text' => 'Nose'],
                    ['value' => 'd', 'text' => 'Tongue']
                ]
            ],
            [
                'text' => '2. The ability to hear sounds is called:',
                'choices' => [
                    ['value' => 'a', 'text' => 'Vision'],
                    ['value' => 'b', 'text' => 'Tactile'],
                    ['value' => 'c', 'text' => 'Audition'],
                    ['value' => 'd', 'text' => 'Olfaction']
                ]
            ],
            [
                'text' => '3. Which of these is NOT one of the five main senses?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Sight'],
                    ['value' => 'b', 'text' => 'Touch'],
                    ['value' => 'c', 'text' => 'Balance'],
                    ['value' => 'd', 'text' => 'Smell']
                ]
            ],
            [
                'text' => '4. Which sense helps you feel if something is hot or cold?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Taste'],
                    ['value' => 'b', 'text' => 'Touch'],
                    ['value' => 'c', 'text' => 'Sight'],
                    ['value' => 'd', 'text' => 'Hearing']
                ]
            ],
            [
                'text' => '5. What is the main sense organ for taste?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Skin'],
                    ['value' => 'b', 'text' => 'Tongue'],
                    ['value' => 'c', 'text' => 'Ears'],
                    ['value' => 'd', 'text' => 'Eyes']
                ]
            ],
            [
                'text' => '6. Which taste can you detect when eating a lemon?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Sweet'],
                    ['value' => 'b', 'text' => 'Salty'],
                    ['value' => 'c', 'text' => 'Sour'],
                    ['value' => 'd', 'text' => 'Bitter']
                ]
            ],
            [
                'text' => '7. Your nose helps you with which sense?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Taste'],
                    ['value' => 'b', 'text' => 'Touch'],
                    ['value' => 'c', 'text' => 'Smell'],
                    ['value' => 'd', 'text' => 'Hearing']
                ]
            ],
            [
                'text' => '8. When you feel something soft or rough, which sense are you using?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Touch'],
                    ['value' => 'b', 'text' => 'Sight'],
                    ['value' => 'c', 'text' => 'Taste'],
                    ['value' => 'd', 'text' => 'Smell']
                ]
            ],
            [
                'text' => '9. What helps you know if music is loud or quiet?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Smell'],
                    ['value' => 'b', 'text' => 'Taste'],
                    ['value' => 'c', 'text' => 'Touch'],
                    ['value' => 'd', 'text' => 'Hearing']
                ]
            ],
            [
                'text' => '10. If you close your eyes and identify an apple by its smell, which sense are you using?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Taste'],
                    ['value' => 'b', 'text' => 'Touch'],
                    ['value' => 'c', 'text' => 'Smell'],
                    ['value' => 'd', 'text' => 'Sight']
                ]
            ]
        ]
    ],
    'plants' => [
        'title' => 'Plants and Animals',
        'subject' => 'Science',
        'questions' => [
            [
                'text' => '1. What do plants need to make their own food?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Meat'],
                    ['value' => 'b', 'text' => 'Sunlight'],
                    ['value' => 'c', 'text' => 'Soil only'],
                    ['value' => 'd', 'text' => 'Other plants']
                ]
            ],
            [
                'text' => '2. Which part of the plant takes in water from the soil?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Leaves'],
                    ['value' => 'b', 'text' => 'Stem'],
                    ['value' => 'c', 'text' => 'Roots'],
                    ['value' => 'd', 'text' => 'Flowers']
                ]
            ],
            [
                'text' => '3. What do animals need to survive?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Only water'],
                    ['value' => 'b', 'text' => 'Only food'],
                    ['value' => 'c', 'text' => 'Food, water, and shelter'],
                    ['value' => 'd', 'text' => 'Only shelter']
                ]
            ],
            [
                'text' => '4. Which animal is a herbivore?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Lion'],
                    ['value' => 'b', 'text' => 'Cow'],
                    ['value' => 'c', 'text' => 'Eagle'],
                    ['value' => 'd', 'text' => 'Shark']
                ]
            ],
            [
                'text' => '5. What is the main difference between plants and animals?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Plants can move, animals cannot'],
                    ['value' => 'b', 'text' => 'Plants make their own food, animals do not'],
                    ['value' => 'c', 'text' => 'Animals are green, plants are not'],
                    ['value' => 'd', 'text' => 'There is no difference']
                ]
            ],
            [
                'text' => '6. Which of these is a carnivore?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Rabbit'],
                    ['value' => 'b', 'text' => 'Deer'],
                    ['value' => 'c', 'text' => 'Horse'],
                    ['value' => 'd', 'text' => 'Lion']
                ]
            ],
            [
                'text' => '7. What do plants release into the air?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Carbon dioxide'],
                    ['value' => 'b', 'text' => 'Water'],
                    ['value' => 'c', 'text' => 'Soil'],
                    ['value' => 'd', 'text' => 'Oxygen']
                ]
            ],
            [
                'text' => '8. Which animal is an omnivore?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Lion'],
                    ['value' => 'b', 'text' => 'Cow'],
                    ['value' => 'c', 'text' => 'Bear'],
                    ['value' => 'd', 'text' => 'Eagle']
                ]
            ],
            [
                'text' => '9. What helps plants grow?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Only water'],
                    ['value' => 'b', 'text' => 'Sunlight, water, and soil'],
                    ['value' => 'c', 'text' => 'Only soil'],
                    ['value' => 'd', 'text' => 'Only sunlight']
                ]
            ],
            [
                'text' => '10. Which of these is a producer in the food chain?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Lion'],
                    ['value' => 'b', 'text' => 'Eagle'],
                    ['value' => 'c', 'text' => 'Shark'],
                    ['value' => 'd', 'text' => 'Tree']
                ]
            ]
        ]
    ],
    'weather' => [
        'title' => 'Weather and Seasons',
        'subject' => 'Science',
        'questions' => [
            [
                'text' => '1. What do we call the four main periods of the year?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Months'],
                    ['value' => 'b', 'text' => 'Seasons'],
                    ['value' => 'c', 'text' => 'Weeks'],
                    ['value' => 'd', 'text' => 'Days']
                ]
            ],
            [
                'text' => '2. Which season comes after summer?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Spring'],
                    ['value' => 'b', 'text' => 'Winter'],
                    ['value' => 'c', 'text' => 'Fall'],
                    ['value' => 'd', 'text' => 'Summer']
                ]
            ],
            [
                'text' => '3. What do we call water that falls from the sky?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Snow'],
                    ['value' => 'b', 'text' => 'Hail'],
                    ['value' => 'c', 'text' => 'Rain'],
                    ['value' => 'd', 'text' => 'Fog']
                ]
            ],
            [
                'text' => '4. Which season is the coldest?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Summer'],
                    ['value' => 'b', 'text' => 'Winter'],
                    ['value' => 'c', 'text' => 'Spring'],
                    ['value' => 'd', 'text' => 'Fall']
                ]
            ],
            [
                'text' => '5. What do we use to measure temperature?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Ruler'],
                    ['value' => 'b', 'text' => 'Scale'],
                    ['value' => 'c', 'text' => 'Thermometer'],
                    ['value' => 'd', 'text' => 'Clock']
                ]
            ],
            [
                'text' => '6. Which season do flowers bloom?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Winter'],
                    ['value' => 'b', 'text' => 'Fall'],
                    ['value' => 'c', 'text' => 'Summer'],
                    ['value' => 'd', 'text' => 'Spring']
                ]
            ],
            [
                'text' => '7. What do we call the movement of air?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Rain'],
                    ['value' => 'b', 'text' => 'Wind'],
                    ['value' => 'c', 'text' => 'Snow'],
                    ['value' => 'd', 'text' => 'Hail']
                ]
            ],
            [
                'text' => '8. Which season do leaves change color?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Spring'],
                    ['value' => 'b', 'text' => 'Summer'],
                    ['value' => 'c', 'text' => 'Winter'],
                    ['value' => 'd', 'text' => 'Fall']
                ]
            ],
            [
                'text' => '9. What do we call a prediction of the weather?',
                'choices' => [
                    ['value' => 'a', 'text' => 'History'],
                    ['value' => 'b', 'text' => 'Forecast'],
                    ['value' => 'c', 'text' => 'Report'],
                    ['value' => 'd', 'text' => 'Story']
                ]
            ],
            [
                'text' => '10. Which season is the hottest?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Winter'],
                    ['value' => 'b', 'text' => 'Spring'],
                    ['value' => 'c', 'text' => 'Summer'],
                    ['value' => 'd', 'text' => 'Fall']
                ]
            ]
        ]
    ],
    'body' => [
        'title' => 'Human Body',
        'subject' => 'Science',
        'questions' => [
            [
                'text' => '1. What pumps blood through your body?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Lungs'],
                    ['value' => 'b', 'text' => 'Brain'],
                    ['value' => 'c', 'text' => 'Heart'],
                    ['value' => 'd', 'text' => 'Liver']
                ]
            ],
            [
                'text' => '2. Which organ helps you breathe?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Heart'],
                    ['value' => 'b', 'text' => 'Lungs'],
                    ['value' => 'c', 'text' => 'Brain'],
                    ['value' => 'd', 'text' => 'Stomach']
                ]
            ],
            [
                'text' => '3. What protects your brain?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Muscles'],
                    ['value' => 'b', 'text' => 'Skin'],
                    ['value' => 'c', 'text' => 'Skull'],
                    ['value' => 'd', 'text' => 'Hair']
                ]
            ],
            [
                'text' => '4. Which part of your body helps you think?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Heart'],
                    ['value' => 'b', 'text' => 'Lungs'],
                    ['value' => 'c', 'text' => 'Brain'],
                    ['value' => 'd', 'text' => 'Stomach']
                ]
            ],
            [
                'text' => '5. What helps you move your body?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Bones'],
                    ['value' => 'b', 'text' => 'Muscles'],
                    ['value' => 'c', 'text' => 'Skin'],
                    ['value' => 'd', 'text' => 'Hair']
                ]
            ],
            [
                'text' => '6. Which part of your body helps you digest food?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Heart'],
                    ['value' => 'b', 'text' => 'Lungs'],
                    ['value' => 'c', 'text' => 'Stomach'],
                    ['value' => 'd', 'text' => 'Brain']
                ]
            ],
            [
                'text' => '7. What gives your body shape?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Muscles'],
                    ['value' => 'b', 'text' => 'Bones'],
                    ['value' => 'c', 'text' => 'Skin'],
                    ['value' => 'd', 'text' => 'Hair']
                ]
            ],
            [
                'text' => '8. Which part of your body helps you see?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Ears'],
                    ['value' => 'b', 'text' => 'Nose'],
                    ['value' => 'c', 'text' => 'Eyes'],
                    ['value' => 'd', 'text' => 'Mouth']
                ]
            ],
            [
                'text' => '9. What helps you hear sounds?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Eyes'],
                    ['value' => 'b', 'text' => 'Nose'],
                    ['value' => 'c', 'text' => 'Ears'],
                    ['value' => 'd', 'text' => 'Mouth']
                ]   
            ],
            [
                'text' => '10. Which part of your body helps you taste food?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Eyes'],
                    ['value' => 'b', 'text' => 'Tongue'],
                    ['value' => 'c', 'text' => 'Nose'],
                    ['value' => 'd', 'text' => 'Ears']
                ]
            ]
        ]
    ],
    'matter' => [
        'title' => 'States of Matter',
        'subject' => 'Science',
        'questions' => [
            [
                'text' => '1. Which state of matter has a definite shape?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Solid'],
                    ['value' => 'b', 'text' => 'Liquid'],
                    ['value' => 'c', 'text' => 'Gas'],
                    ['value' => 'd', 'text' => 'Plasma']
                ]
            ],
            [
                'text' => '2. What happens when you heat a solid?',
                'choices' => [
                    ['value' => 'a', 'text' => 'It becomes colder'],
                    ['value' => 'b', 'text' => 'It melts'],
                    ['value' => 'c', 'text' => 'It freezes'],
                    ['value' => 'd', 'text' => 'Nothing happens']
                ]
            ],
            [
                'text' => '3. Which state of matter takes the shape of its container?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Solid'],
                    ['value' => 'b', 'text' => 'Gas'],
                    ['value' => 'c', 'text' => 'Plasma'],
                    ['value' => 'd', 'text' => 'Liquid']
                ]
            ],
            [
                'text' => '4. What is water vapor?',
                'choices' => [
                    ['value' => 'a', 'text' => 'A solid'],
                    ['value' => 'b', 'text' => 'A liquid'],
                    ['value' => 'c', 'text' => 'A gas'],
                    ['value' => 'd', 'text' => 'A plasma']
                ]
            ],
            [
                'text' => '5. What happens when you cool a gas?',
                'choices' => [
                    ['value' => 'a', 'text' => 'It becomes a solid'],
                    ['value' => 'b', 'text' => 'It condenses'],
                    ['value' => 'c', 'text' => 'It evaporates'],
                    ['value' => 'd', 'text' => 'Nothing happens']
                ]
            ],
            [
                'text' => '6. Which state of matter has no definite shape or volume?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Gas'],
                    ['value' => 'b', 'text' => 'Liquid'],
                    ['value' => 'c', 'text' => 'Solid'],
                    ['value' => 'd', 'text' => 'Plasma']
                ]
            ],
            [
                'text' => '7. What is the process of a liquid becoming a gas called?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Freezing'],
                    ['value' => 'b', 'text' => 'Melting'],
                    ['value' => 'c', 'text' => 'Condensation'],
                    ['value' => 'd', 'text' => 'Evaporation']
                ]
            ],
            [
                'text' => '8. What happens when you freeze water?',
                'choices' => [
                    ['value' => 'a', 'text' => 'It becomes a gas'],
                    ['value' => 'b', 'text' => 'It becomes a solid'],
                    ['value' => 'c', 'text' => 'It becomes a plasma'],
                    ['value' => 'd', 'text' => 'Nothing happens']
                ]
            ],
            [
                'text' => '9. Which state of matter can you pour?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Solid'],
                    ['value' => 'b', 'text' => 'Liquid'],
                    ['value' => 'c', 'text' => 'Gas'],
                    ['value' => 'd', 'text' => 'Plasma']
                ]
            ],
            [
                'text' => '10. What is the process of a gas becoming a liquid called?',
                'choices' => [
                    ['value' => 'a', 'text' => 'Evaporation'],
                    ['value' => 'b', 'text' => 'Melting'],
                    ['value' => 'c', 'text' => 'Condensation'],
                    ['value' => 'd', 'text' => 'Freezing']
                ]
            ]
        ]
    ],

    'phonics' => [
        'title' => 'Alphabet and Phonics',
        'subject' => 'English',
        'questions' => [
        [
            'text' => '1. How many letters are in the English alphabet?',
            'choices' => [
                ['value' => 'a', 'text' => '24'],
                ['value' => 'b', 'text' => '26'],
                ['value' => 'c', 'text' => '28'],
                ['value' => 'd', 'text' => '30']
            ]
        ],
        [
            'text' => '2. Which of these is a vowel?',
            'choices' => [
                ['value' => 'a', 'text' => 'B'],
                ['value' => 'b', 'text' => 'C'],
                ['value' => 'c', 'text' => 'E'],
                ['value' => 'd', 'text' => 'T']
            ]
        ],
        [
            'text' => '3. Which word has a short vowel sound?',
            'choices' => [
                ['value' => 'a', 'text' => 'cat'],
                ['value' => 'b', 'text' => 'cake'],
                ['value' => 'c', 'text' => 'cute'],
                ['value' => 'd', 'text' => 'kite']
            ]
        ],
        [
            'text' => '4. Which word begins with a consonant blend?',
            'choices' => [
                ['value' => 'a', 'text' => 'ship'],
                ['value' => 'b', 'text' => 'stop'],
                ['value' => 'c', 'text' => 'chart'],
                ['value' => 'd', 'text' => 'when']
            ]
        ],
        [
            'text' => '5. Which letter makes the sound we hear at the beginning of "yellow"?',
            'choices' => [
                ['value' => 'a', 'text' => 'J'],
                ['value' => 'b', 'text' => 'U'],
                ['value' => 'c', 'text' => 'Y'],
                ['value' => 'd', 'text' => 'W']
            ]
        ],
        [
            'text' => '6. Which is a consonant digraph?',
            'choices' => [
                ['value' => 'a', 'text' => 'br'],
                ['value' => 'b', 'text' => 'st'],
                ['value' => 'c', 'text' => 'sh'],
                ['value' => 'd', 'text' => 'pl']
            ]
        ],
        [
            'text' => '7. How many syllables are in the word "elephant"?',
            'choices' => [
                ['value' => 'a', 'text' => '2'],
                ['value' => 'b', 'text' => '3'],
                ['value' => 'c', 'text' => '4'],
                ['value' => 'd', 'text' => '5']
            ]
        ],
        [
            'text' => '8. Which word has a long vowel sound?',
            'choices' => [
                ['value' => 'a', 'text' => 'bed'],
                ['value' => 'b', 'text' => 'hot'],
                ['value' => 'c', 'text' => 'kite'],
                ['value' => 'd', 'text' => 'sun']
            ]
        ],
        [
            'text' => '9. Which letter makes the sound we hear at the beginning of "queen"?',
            'choices' => [
                ['value' => 'a', 'text' => 'K'],
                ['value' => 'b', 'text' => 'Q'],
                ['value' => 'c', 'text' => 'C'],
                ['value' => 'd', 'text' => 'G']
            ]
        ],
        [
            'text' => '10. Which word begins with the same sound as "phone"?',
            'choices' => [
                ['value' => 'a', 'text' => 'fish'],
                ['value' => 'b', 'text' => 'pig'],
                ['value' => 'c', 'text' => 'duck'],
                ['value' => 'd', 'text' => 'car']
            ]
        ]
    ]
],
    
'grammar' => [
    'title' => 'Basic Grammar',
    'subject' => 'English',
    'questions' => [
        [
            'text' => '1. Which word is a noun?',
            'choices' => [
                ['value' => 'a', 'text' => 'run'],
                ['value' => 'b', 'text' => 'happy'],
                ['value' => 'c', 'text' => 'teacher'],
                ['value' => 'd', 'text' => 'quickly']
            ]
        ],
        [
            'text' => '2. Which word is a verb?',
            'choices' => [
                ['value' => 'a', 'text' => 'jump'],
                ['value' => 'b', 'text' => 'green'],
                ['value' => 'c', 'text' => 'house'],
                ['value' => 'd', 'text' => 'slow']
            ]
        ],
        [
            'text' => '3. Which word is an adjective?',
            'choices' => [
                ['value' => 'a', 'text' => 'school'],
                ['value' => 'b', 'text' => 'beautiful'],
                ['value' => 'c', 'text' => 'walk'],
                ['value' => 'd', 'text' => 'quickly']
            ]
        ],
        [
            'text' => '4. Which of these is a proper noun?',
            'choices' => [
                ['value' => 'a', 'text' => 'city'],
                ['value' => 'b', 'text' => 'dog'],
                ['value' => 'c', 'text' => 'mountain'],
                ['value' => 'd', 'text' => 'New York']
            ]
        ],
        [
            'text' => '5. Which sentence uses a verb correctly?',
            'choices' => [
                ['value' => 'a', 'text' => 'The boy runs fast.'],
                ['value' => 'b', 'text' => 'The boy fast runs.'],
                ['value' => 'c', 'text' => 'The fast boy run.'],
                ['value' => 'd', 'text' => 'The runs boy fast.']
            ]
        ],
        [
            'text' => '6. Which word describes how something looks?',
            'choices' => [
                ['value' => 'a', 'text' => 'eating'],
                ['value' => 'b', 'text' => 'blue'],
                ['value' => 'c', 'text' => 'speak'],
                ['value' => 'd', 'text' => 'book']
            ]
        ],
        [
            'text' => '7. Which is a common noun?',
            'choices' => [
                ['value' => 'a', 'text' => 'tree'],
                ['value' => 'b', 'text' => 'Monday'],
                ['value' => 'c', 'text' => 'London'],
                ['value' => 'd', 'text' => 'Mrs. Smith']
            ]
        ],
        [
            'text' => '8. Which sentence uses an adjective correctly?',
            'choices' => [
                ['value' => 'a', 'text' => 'The happy girl the prize won.'],
                ['value' => 'b', 'text' => 'The girl happy won the prize.'],
                ['value' => 'c', 'text' => 'The happy girl won the prize.'],
                ['value' => 'd', 'text' => 'The girl won the happy prize.']
            ]
        ],
        [
            'text' => '9. Which word is NOT a verb?',
            'choices' => [
                ['value' => 'a', 'text' => 'swim'],
                ['value' => 'b', 'text' => 'dance'],
                ['value' => 'c', 'text' => 'play'],
                ['value' => 'd', 'text' => 'beautiful']
            ]
        ],
        [
            'text' => '10. Which word tells what someone does?',
            'choices' => [
                ['value' => 'a', 'text' => 'school'],
                ['value' => 'b', 'text' => 'pretty'],
                ['value' => 'c', 'text' => 'write'],
                ['value' => 'd', 'text' => 'slowly']
            ]
        ]
    ]
],

'reading_stories' => [
    'title' => 'Reading Short Stories',
    'subject' => 'English',
    'questions' => [
        [
            'text' => '1. In "The Red Hat" story, what color was Pat\'s hat?',
            'choices' => [
                ['value' => 'a', 'text' => 'Red'],
                ['value' => 'b', 'text' => 'Blue'],
                ['value' => 'c', 'text' => 'Green'],
                ['value' => 'd', 'text' => 'Yellow']
            ]
        ],
        [
            'text' => '2. In "The Red Hat" story, where did Pat find his hat?',
            'choices' => [
                ['value' => 'a', 'text' => 'On a tree'],
                ['value' => 'b', 'text' => 'On a bush'],
                ['value' => 'c', 'text' => 'In a pond'],
                ['value' => 'd', 'text' => 'Under a rock']
            ]
        ],
        [
            'text' => '3. In "The Red Hat" story, how did Pat feel at the end?',
            'choices' => [
                ['value' => 'a', 'text' => 'Happy'],
                ['value' => 'b', 'text' => 'Sad'],
                ['value' => 'c', 'text' => 'Angry'],
                ['value' => 'd', 'text' => 'Scared']
            ]
        ],
        [
            'text' => '4. In "The Cat and the Dog" story, where did the cat sit?',
            'choices' => [
                ['value' => 'a', 'text' => 'On a chair'],
                ['value' => 'b', 'text' => 'On a bed'],
                ['value' => 'c', 'text' => 'On a mat'],
                ['value' => 'd', 'text' => 'On a box']
            ]
        ],
        [
            'text' => '5. In "The Cat and the Dog" story, what did the dog ask?',
            'choices' => [
                ['value' => 'a', 'text' => 'Can I chase you?'],
                ['value' => 'b', 'text' => 'Can I sit with you?'],
                ['value' => 'c', 'text' => 'Can I have food?'],
                ['value' => 'd', 'text' => 'Can I sleep here?']
            ]
        ],
        [
            'text' => '6. In "The Cat and the Dog" story, did the animals become friends?',
            'choices' => [
                ['value' => 'a', 'text' => 'Yes'],
                ['value' => 'b', 'text' => 'No'],
                ['value' => 'c', 'text' => 'The story doesn\'t say'],
                ['value' => 'd', 'text' => 'Only for a little while']
            ]
        ],
        [
            'text' => '7. Which is the correct order of events in "The Red Hat" story?',
            'choices' => [
                ['value' => 'a', 'text' => 'Pat found his hat, the wind blew it away, Pat was happy'],
                ['value' => 'b', 'text' => 'Pat had a hat, the wind blew it away, Pat found it'],
                ['value' => 'c', 'text' => 'The wind blew a hat, Pat found it, Pat was sad'],
                ['value' => 'd', 'text' => 'Pat lost his hat, he was happy, he found it on a bush']
            ]
        ],
        [
            'text' => '8. What blew Pat\'s hat away?',
            'choices' => [
                ['value' => 'a', 'text' => 'A dog'],
                ['value' => 'b', 'text' => 'A cat'],
                ['value' => 'c', 'text' => 'The wind'],
                ['value' => 'd', 'text' => 'A bird']
            ]
        ],
        [
            'text' => '9. How long did the cat and dog sit on the mat?',
            'choices' => [
                ['value' => 'a', 'text' => 'For one hour'],
                ['value' => 'b', 'text' => 'Until dinner time'],
                ['value' => 'c', 'text' => 'All day'],
                ['value' => 'd', 'text' => 'Until it rained']
            ]
        ],
        [
            'text' => '10. Which sentence from "The Cat and the Dog" story shows that the dog was polite?',
            'choices' => [
                ['value' => 'a', 'text' => 'A dog ran up to the cat.'],
                ['value' => 'b', 'text' => 'Can I sit with you?" asked the dog.'],
                ['value' => 'c', 'text' => 'The dog sat down.'],
                ['value' => 'd', 'text' => 'They sat on the mat all day.']
            ]
        ]
    ]
],

'spelling_and_vocabulary' => [
    'title' => 'Spelling and Vocabulary',
    'subject' => 'English',
    'questions' => [
        [
            'text' => '1. Which word belongs in the "-at" word family?',
            'choices' => [
                ['value' => 'a', 'text' => 'bag'],
                ['value' => 'b', 'text' => 'bat'],
                ['value' => 'c', 'text' => 'bet'],
                ['value' => 'd', 'text' => 'but']
            ]
        ],
        [
            'text' => '2. Which word belongs in the "-an" word family?',
            'choices' => [
                ['value' => 'a', 'text' => 'ant'],
                ['value' => 'b', 'text' => 'man'],
                ['value' => 'c', 'text' => 'and'],
                ['value' => 'd', 'text' => 'any']
            ]
        ],
        [
            'text' => '3. Which of these is a sight word?',
            'choices' => [
                ['value' => 'a', 'text' => 'jump'],
                ['value' => 'b', 'text' => 'with'],
                ['value' => 'c', 'text' => 'dog'],
                ['value' => 'd', 'text' => 'happy']
            ]
        ],
        [
            'text' => '4. Which word means "feeling joy"?',
            'choices' => [
                ['value' => 'a', 'text' => 'sad'],
                ['value' => 'b', 'text' => 'happy'],
                ['value' => 'c', 'text' => 'fast'],
                ['value' => 'd', 'text' => 'big']
            ]
        ],
        [
            'text' => '5. Which word means "moving quickly"?',
            'choices' => [
                ['value' => 'a', 'text' => 'slow'],
                ['value' => 'b', 'text' => 'fast'],
                ['value' => 'c', 'text' => 'hot'],
                ['value' => 'd', 'text' => 'cold']
            ]
        ],
        [
            'text' => '6. Which word belongs in the "-ig" word family?',
            'choices' => [
                ['value' => 'a', 'text' => 'pig'],
                ['value' => 'b', 'text' => 'pin'],
                ['value' => 'c', 'text' => 'pat'],
                ['value' => 'd', 'text' => 'pan']
            ]
        ],
        [
            'text' => '7. Which of these is NOT a sight word?',
            'choices' => [
                ['value' => 'a', 'text' => 'the'],
                ['value' => 'b', 'text' => 'and'],
                ['value' => 'c', 'text' => 'was'],
                ['value' => 'd', 'text' => 'jump']
            ]
        ],
        [
            'text' => '8. Which word means "not new"?',
            'choices' => [
                ['value' => 'a', 'text' => 'big'],
                ['value' => 'b', 'text' => 'small'],
                ['value' => 'c', 'text' => 'fast'],
                ['value' => 'd', 'text' => 'old']
            ]
        ],
        [
            'text' => '9. Which word belongs in the "-op" word family?',
            'choices' => [
                ['value' => 'a', 'text' => 'pot'],
                ['value' => 'b', 'text' => 'pit'],
                ['value' => 'c', 'text' => 'hop'],
                ['value' => 'd', 'text' => 'hat']
            ]
        ],
        [
            'text' => '10. Which word means "little in size"?',
            'choices' => [
                ['value' => 'a', 'text' => 'small'],
                ['value' => 'b', 'text' => 'slow'],
                ['value' => 'c', 'text' => 'sad'],
                ['value' => 'd', 'text' => 'cold']
            ]
        ]
    ]
],

'sentence_formation' => [
    'title' => 'Sentence Formation',
    'subject' => 'English',
    'questions' => [
        [
            'text' => '1. What should every sentence start with?',
            'choices' => [
                ['value' => 'a', 'text' => 'A question mark'],
                ['value' => 'b', 'text' => 'A capital letter'],
                ['value' => 'c', 'text' => 'A noun'],
                ['value' => 'd', 'text' => 'A verb']
            ]
        ],
        [
            'text' => '2. What should every sentence end with?',
            'choices' => [
                ['value' => 'a', 'text' => 'A punctuation mark'],
                ['value' => 'b', 'text' => 'A period only'],
                ['value' => 'c', 'text' => 'A noun'],
                ['value' => 'd', 'text' => 'A verb']
            ]
        ],
        [
            'text' => '3. Which is a complete sentence?',
            'choices' => [
                ['value' => 'a', 'text' => 'The cat sleeps.'],
                ['value' => 'b', 'text' => 'The cat.'],
                ['value' => 'c', 'text' => 'Sleeps on the bed.'],
                ['value' => 'd', 'text' => 'The sleeping cat.']
            ]
        ],
        [
            'text' => '4. Which sentence follows the pattern: Subject + Verb + Object?',
            'choices' => [
                ['value' => 'a', 'text' => 'The dog barks.'],
                ['value' => 'b', 'text' => 'The girl kicks the ball.'],
                ['value' => 'c', 'text' => 'The milk is cold.'],
                ['value' => 'd', 'text' => 'Birds fly.']
            ]
        ],
        [
            'text' => '5. Which sentence follows the pattern: Subject + Verb?',
            'choices' => [
                ['value' => 'a', 'text' => 'Birds fly.'],
                ['value' => 'b', 'text' => 'She is happy.'],
                ['value' => 'c', 'text' => 'Tim reads a book.'],
                ['value' => 'd', 'text' => 'The cat drinks milk.']
            ]
        ],
        [
            'text' => '6. Which sentence follows the pattern: Subject + Verb + Adjective?',
            'choices' => [
                ['value' => 'a', 'text' => 'The dog barks loudly.'],
                ['value' => 'b', 'text' => 'The girl kicks the ball.'],
                ['value' => 'c', 'text' => 'The milk is cold.'],
                ['value' => 'd', 'text' => 'Birds fly high in the sky.']
            ]
        ],
        [
            'text' => '7. Which sentence is punctuated correctly?',
            'choices' => [
                ['value' => 'a', 'text' => 'The dog barks.'],
                ['value' => 'b', 'text' => 'the dog barks'],
                ['value' => 'c', 'text' => 'The dog barks'],
                ['value' => 'd', 'text' => 'The dog barks,']
            ]
        ],
        [
            'text' => '8. In the sentence "The cat drinks milk," what is the subject?',
            'choices' => [
                ['value' => 'a', 'text' => 'The cat'],
                ['value' => 'b', 'text' => 'drinks'],
                ['value' => 'c', 'text' => 'milk'],
                ['value' => 'd', 'text' => 'The cat drinks']
            ]
        ],
        [
            'text' => '9. In the sentence "The cat drinks milk," what is the verb?',
            'choices' => [
                ['value' => 'a', 'text' => 'The cat'],
                ['value' => 'b', 'text' => 'drinks'],
                ['value' => 'c', 'text' => 'milk'],
                ['value' => 'd', 'text' => 'The cat drinks']
            ]
        ],
        [
            'text' => '10. Which sentence has both a subject and a predicate?',
            'choices' => [
                ['value' => 'a', 'text' => 'Running fast.'],
                ['value' => 'b', 'text' => 'The big dog.'],
                ['value' => 'c', 'text' => 'Tim reads books.'],
                ['value' => 'd', 'text' => 'Happy and']
            ]
        ]
    ]
],


'numbers_counting' => [
    'title' => 'Numbers and Counting',
    'subject' => 'Mathematics',
    'questions' => [
        [
            'text' => '1. What number comes after 29?',
            'choices' => [
                ['value' => 'a', 'text' => '28'],
                ['value' => 'b', 'text' => '30'],
                ['value' => 'c', 'text' => '39'],
                ['value' => 'd', 'text' => '20']
            ]
        ],
        [
            'text' => '2. Write the number that shows 4 tens and 7 ones.',
            'choices' => [
                ['value' => 'a', 'text' => '74'],
                ['value' => 'b', 'text' => '47'],
                ['value' => 'c', 'text' => '407'],
                ['value' => 'd', 'text' => '4.7']
            ]
        ],
        [
            'text' => '3. Which symbol goes in the blank to make this statement true? 16 ____ 12',
            'choices' => [
                ['value' => 'a', 'text' => '='],
                ['value' => 'b', 'text' => '<'],
                ['value' => 'c', 'text' => '>'],
                ['value' => 'd', 'text' => '+']
            ]
        ],
        [
            'text' => '4. Count by 5s from 5 to 30. Which number would NOT be said?',
            'choices' => [
                ['value' => 'a', 'text' => '10'],
                ['value' => 'b', 'text' => '15'],
                ['value' => 'c', 'text' => '25'],
                ['value' => 'd', 'text' => '24']
            ]
        ],
        [
            'text' => '5. What is the value of the digit 7 in the number 275?',
            'choices' => [
                ['value' => 'a', 'text' => '7'],
                ['value' => 'b', 'text' => '70'],
                ['value' => 'c', 'text' => '700'],
                ['value' => 'd', 'text' => '7,000']
            ]
        ],
        [
            'text' => '6. If you have 8 pencils and your friend has 12 pencils, how many more pencils does your friend have?',
            'choices' => [
                ['value' => 'a', 'text' => '4'],
                ['value' => 'b', 'text' => '20'],
                ['value' => 'c', 'text' => '3'],
                ['value' => 'd', 'text' => '5']
            ]
        ],
        [
            'text' => '7. Which shows the numbers in order from smallest to largest?',
            'choices' => [
                ['value' => 'a', 'text' => '45, 54, 35, 53'],
                ['value' => 'b', 'text' => '35, 45, 53, 54'],
                ['value' => 'c', 'text' => '53, 54, 35, 45'],
                ['value' => 'd', 'text' => '35, 53, 45, 54']
            ]
        ],
        [
            'text' => '8. What number is represented on this number line? <br>0---1---2---3---4---5---X---7---8---9---10→',
            'choices' => [
                ['value' => 'a', 'text' => '5'],
                ['value' => 'b', 'text' => '6'],
                ['value' => 'c', 'text' => '7'],
                ['value' => 'd', 'text' => '8']
            ]
        ],
        [
            'text' => '9. In the number 136, which digit is in the tens place?',
            'choices' => [
                ['value' => 'a', 'text' => '1'],
                ['value' => 'b', 'text' => '3'],
                ['value' => 'c', 'text' => '6'],
                ['value' => 'd', 'text' => '13']
            ]
        ],
        [
            'text' => '10. Which shows one-to-one correspondence in counting?',
            'choices' => [
                ['value' => 'a', 'text' => 'Counting some objects twice'],
                ['value' => 'b', 'text' => 'Skipping some objects when counting'],
                ['value' => 'c', 'text' => 'Pointing to each object exactly once as you count'],
                ['value' => 'd', 'text' => 'Counting backward']
            ]
        ]
    ]
],

'basic_addition_subtraction' => [
    'title' => 'Basic Addition and Subtraction',
    'subject' => 'Mathematics',
    'questions' => [
        [
            'text' => '1. What is 7 + 5?',
            'choices' => [
                ['value' => 'a', 'text' => '11'],
                ['value' => 'b', 'text' => '12'],
                ['value' => 'c', 'text' => '13'],
                ['value' => 'd', 'text' => '2']
            ]
        ],
        [
            'text' => '2. If you have 14 stickers and give away 6, how many stickers do you have left?',
            'choices' => [
                ['value' => 'a', 'text' => '8'],
                ['value' => 'b', 'text' => '7'],
                ['value' => 'c', 'text' => '9'],
                ['value' => 'd', 'text' => '20']
            ]
        ],
        [
            'text' => '3. What addition fact belongs in the same fact family as 8 - 5 = 3?',
            'choices' => [
                ['value' => 'a', 'text' => '3 + 5 = 8'],
                ['value' => 'b', 'text' => '5 + 5 = 10'],
                ['value' => 'c', 'text' => '8 + 3 = 11'],
                ['value' => 'd', 'text' => '3 + 3 = 6']
            ]
        ],
        [
            'text' => '4. What is 9 + 6?',
            'choices' => [
                ['value' => 'a', 'text' => '14'],
                ['value' => 'b', 'text' => '15'],
                ['value' => 'c', 'text' => '16'],
                ['value' => 'd', 'text' => '13']
            ]
        ],
        [
            'text' => '5. If you\'re using the "counting on" strategy for 8 + 4, which numbers would you say?',
            'choices' => [
                ['value' => 'a', 'text' => '"1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12"'],
                ['value' => 'b', 'text' => '"8, 9, 10, 11, 12"'],
                ['value' => 'c', 'text' => '"4, 5, 6, 7, 8"'],
                ['value' => 'd', 'text' => '"9, 10, 11, 12"']
            ]
        ],
        [
            'text' => '6. Maria had 15 candies. She ate some and now has 9 candies. How many did she eat?',
            'choices' => [
                ['value' => 'a', 'text' => '6'],
                ['value' => 'b', 'text' => '7'],
                ['value' => 'c', 'text' => '5'],
                ['value' => 'd', 'text' => '24']
            ]
        ],
        [
            'text' => '7. Which "making ten" strategy works for 8 + 7?',
            'choices' => [
                ['value' => 'a', 'text' => '8 + 2 = 10, then 10 + 5 = 15'],
                ['value' => 'b', 'text' => '8 + 7 = 15'],
                ['value' => 'c', 'text' => '7 + 7 = 14, then 14 + 1 = 15'],
                ['value' => 'd', 'text' => '8 + 8 = 16, then 16 - 1 = 15']
            ]
        ],
        [
            'text' => '8. What is 13 - 8?',
            'choices' => [
                ['value' => 'a', 'text' => '6'],
                ['value' => 'b', 'text' => '5'],
                ['value' => 'c', 'text' => '4'],
                ['value' => 'd', 'text' => '21']
            ]
        ],
        [
            'text' => '9. Which number sentence shows a doubles fact?',
            'choices' => [
                ['value' => 'a', 'text' => '6 + 4 = 10'],
                ['value' => 'b', 'text' => '5 + 5 = 10'],
                ['value' => 'c', 'text' => '8 + 2 = 10'],
                ['value' => 'd', 'text' => '7 + 3 = 10']
            ]
        ],
        [
            'text' => '10. Alex has 12 toy cars. He gives 5 to his sister and buys 3 more. How many toy cars does he have now?',
            'choices' => [
                ['value' => 'a', 'text' => '14'],
                ['value' => 'b', 'text' => '10'],
                ['value' => 'c', 'text' => '9'],
                ['value' => 'd', 'text' => '7']
            ]
        ]
    ]
],

'multiplication_division' => [
    'title' => 'Multiplication and Division',
    'subject' => 'Mathematics',
    'questions' => [
        [
            'text' => '1. What is 4 × 6?',
            'choices' => [
                ['value' => 'a', 'text' => '10'],
                ['value' => 'b', 'text' => '24'],
                ['value' => 'c', 'text' => '20'],
                ['value' => 'd', 'text' => '46']
            ]
        ],
        [
            'text' => '2. If you have 15 cookies and want to share them equally among 3 children, how many cookies will each child get?',
            'choices' => [
                ['value' => 'a', 'text' => '3'],
                ['value' => 'b', 'text' => '4'],
                ['value' => 'c', 'text' => '5'],
                ['value' => 'd', 'text' => '6']
            ]
        ],
        [
            'text' => '3. Which shows 3 × 4 as repeated addition?',
            'choices' => [
                ['value' => 'a', 'text' => '3 + 3 + 3 + 3'],
                ['value' => 'b', 'text' => '4 + 4 + 4'],
                ['value' => 'c', 'text' => '3 + 4'],
                ['value' => 'd', 'text' => '3 × 4']
            ]
        ],
        [
            'text' => '4. What is 18 ÷ 2?',
            'choices' => [
                ['value' => 'a', 'text' => '7'],
                ['value' => 'b', 'text' => '8'],
                ['value' => 'c', 'text' => '9'],
                ['value' => 'd', 'text' => '16']
            ]
        ],
        [
            'text' => '5. Which multiplication property shows that 2 × 7 = 7 × 2?',
            'choices' => [
                ['value' => 'a', 'text' => 'Zero Property'],
                ['value' => 'b', 'text' => 'Commutative Property'],
                ['value' => 'c', 'text' => 'Associative Property'],
                ['value' => 'd', 'text' => 'Identity Property']
            ]
        ],
        [
            'text' => '6. How many groups of 4 can you make from 20 objects?',
            'choices' => [
                ['value' => 'a', 'text' => '4'],
                ['value' => 'b', 'text' => '5'],
                ['value' => 'c', 'text' => '6'],
                ['value' => 'd', 'text' => '16']
            ]
        ],
        [
            'text' => '7. What division problem is related to 6 × 7 = 42?',
            'choices' => [
                ['value' => 'a', 'text' => '42 ÷ 6 = 7'],
                ['value' => 'b', 'text' => '42 ÷ 7 = 6'],
                ['value' => 'c', 'text' => 'Both A and B'],
                ['value' => 'd', 'text' => '42 ÷ 13 = 29']
            ]
        ],
        [
            'text' => '8. Using skip counting by 3s, which number would you NOT say when counting to 30?',
            'choices' => [
                ['value' => 'a', 'text' => '3'],
                ['value' => 'b', 'text' => '9'],
                ['value' => 'c', 'text' => '16'],
                ['value' => 'd', 'text' => '27']
            ]
        ],
        [
            'text' => '9. What is 0 × 9?',
            'choices' => [
                ['value' => 'a', 'text' => '0'],
                ['value' => 'b', 'text' => '9'],
                ['value' => 'c', 'text' => '1'],
                ['value' => 'd', 'text' => 'Cannot be determined']
            ]
        ],
        [
            'text' => '10. If you arrange 15 stars in 3 equal rows, how many stars will be in each row?',
            'choices' => [
                ['value' => 'a', 'text' => '3'],
                ['value' => 'b', 'text' => '5'],
                ['value' => 'c', 'text' => '12'],
                ['value' => 'd', 'text' => '18']
            ]
        ]
    ]
],

'shapes_patterns' => [
    'title' => 'Shapes and Patterns',
    'subject' => 'Mathematics',
    'questions' => [
        [
            'text' => '1. How many sides does a pentagon have?',
            'choices' => [
                ['value' => 'a', 'text' => '3'],
                ['value' => 'b', 'text' => '4'],
                ['value' => 'c', 'text' => '5'],
                ['value' => 'd', 'text' => '6']
            ]
        ],
        [
            'text' => '2. Which shape has exactly 4 sides of equal length and 4 right angles?',
            'choices' => [
                ['value' => 'a', 'text' => 'Rectangle'],
                ['value' => 'b', 'text' => 'Square'],
                ['value' => 'c', 'text' => 'Rhombus'],
                ['value' => 'd', 'text' => 'Triangle']
            ]
        ],
        [
            'text' => '3. Which 3D shape has 6 square faces?',
            'choices' => [
                ['value' => 'a', 'text' => 'Sphere'],
                ['value' => 'b', 'text' => 'Pyramid'],
                ['value' => 'c', 'text' => 'Cube'],
                ['value' => 'd', 'text' => 'Cone']
            ]
        ],
        [
            'text' => '4. What comes next in this pattern? Circle, Square, Triangle, Circle, Square, ___',
            'choices' => [
                ['value' => 'a', 'text' => 'Circle'],
                ['value' => 'b', 'text' => 'Square'],
                ['value' => 'c', 'text' => 'Triangle'],
                ['value' => 'd', 'text' => 'Rectangle']
            ]
        ],
        [
            'text' => '5. Which shape can roll but not slide?',
            'choices' => [
                ['value' => 'a', 'text' => 'Cube'],
                ['value' => 'b', 'text' => 'Sphere'],
                ['value' => 'c', 'text' => 'Pyramid'],
                ['value' => 'd', 'text' => 'Rectangular prism']
            ]
        ],
        [
            'text' => '6. How many lines of symmetry does a square have?',
            'choices' => [
                ['value' => 'a', 'text' => '1'],
                ['value' => 'b', 'text' => '2'],
                ['value' => 'c', 'text' => '4'],
                ['value' => 'd', 'text' => '0']
            ]
        ],
        [
            'text' => '7. What is the pattern rule for this sequence? 2, 5, 8, 11, 14, ...',
            'choices' => [
                ['value' => 'a', 'text' => 'Add 2'],
                ['value' => 'b', 'text' => 'Add 3'],
                ['value' => 'c', 'text' => 'Add 4'],
                ['value' => 'd', 'text' => 'Multiply by 2']
            ]
        ],
        [
            'text' => '8. Which of these is NOT a vertex?',
            'choices' => [
                ['value' => 'a', 'text' => 'Corner of a square'],
                ['value' => 'b', 'text' => 'Center of a circle'],
                ['value' => 'c', 'text' => 'Point where two edges meet'],
                ['value' => 'd', 'text' => 'Corner of a triangle']
            ]
        ],
        [
            'text' => '9. In an AABB pattern, if A is a star and B is a heart, how would the pattern look?',
            'choices' => [
                ['value' => 'a', 'text' => 'Star, Heart, Star, Heart'],
                ['value' => 'b', 'text' => 'Star, Star, Heart, Heart'],
                ['value' => 'c', 'text' => 'Star, Heart, Heart, Star'],
                ['value' => 'd', 'text' => 'Star, Star, Star, Heart']
            ]
        ],
        [
            'text' => '10. Which shape has no straight sides?',
            'choices' => [
                ['value' => 'a', 'text' => 'Triangle'],
                ['value' => 'b', 'text' => 'Square'],
                ['value' => 'c', 'text' => 'Circle'],
                ['value' => 'd', 'text' => 'Rectangle']
            ]
        ]
    ]
],

'fractions_basic' => [
    'title' => 'Fractions Basic',
    'subject' => 'Mathematics',
    'questions' => [
        [
            'text' => '1. Which fraction represents one-half?',
            'choices' => [
                ['value' => 'a', 'text' => '1/3'],
                ['value' => 'b', 'text' => '1/2'],
                ['value' => 'c', 'text' => '2/1'],
                ['value' => 'd', 'text' => '2/3']
            ]
        ],
        [
            'text' => '2. In the fraction 3/4, what does the 4 represent?',
            'choices' => [
                ['value' => 'a', 'text' => 'The number of parts we have'],
                ['value' => 'b', 'text' => 'The number of equal parts the whole is divided into'],
                ['value' => 'c', 'text' => 'The total number of wholes'],
                ['value' => 'd', 'text' => 'The difference between the parts']
            ]
        ],
        [
            'text' => '3. Which fraction shows the shaded part of this circle? (Imagine 1 of 4 parts is shaded)',
            'choices' => [
                ['value' => 'a', 'text' => '1/2'],
                ['value' => 'b', 'text' => '1/3'],
                ['value' => 'c', 'text' => '1/4'],
                ['value' => 'd', 'text' => '3/4']
            ]
        ],
        [
            'text' => '4. Which is equal to 1/2?',
            'choices' => [
                ['value' => 'a', 'text' => '1/4'],
                ['value' => 'b', 'text' => '2/3'],
                ['value' => 'c', 'text' => '2/4'],
                ['value' => 'd', 'text' => '3/6']
            ]
        ],
        [
            'text' => '5. If you cut a pizza into 8 equal slices and eat 2 slices, what fraction of the pizza have you eaten?',
            'choices' => [
                ['value' => 'a', 'text' => '2/8'],
                ['value' => 'b', 'text' => '1/4'],
                ['value' => 'c', 'text' => 'Both A and B'],
                ['value' => 'd', 'text' => '6/8']
            ]
        ],
        [
            'text' => '6. What fraction of this set is shaded? (Imagine 3 out of 5 circles shaded)',
            'choices' => [
                ['value' => 'a', 'text' => '3/5'],
                ['value' => 'b', 'text' => '5/3'],
                ['value' => 'c', 'text' => '2/5'],
                ['value' => 'd', 'text' => '3/2']
            ]
        ],
        [
            'text' => '7. On a number line from 0 to 1, where would 1/4 be located?',
            'choices' => [
                ['value' => 'a', 'text' => 'Closer to 0 than to 1/2'],
                ['value' => 'b', 'text' => 'Exactly halfway between 0 and 1'],
                ['value' => 'c', 'text' => 'Closer to 1 than to 1/2'],
                ['value' => 'd', 'text' => 'At the same point as 1/2']
            ]
        ],
        [
            'text' => '8. Which fraction is NOT equivalent to 1/2?',
            'choices' => [
                ['value' => 'a', 'text' => '2/4'],
                ['value' => 'b', 'text' => '3/6'],
                ['value' => 'c', 'text' => '4/8'],
                ['value' => 'd', 'text' => '2/5']
            ]
        ],
        [
            'text' => '9. If you fold a paper in half and then in half again, each piece is what fraction of the whole?',
            'choices' => [
                ['value' => 'a', 'text' => '1/2'],
                ['value' => 'b', 'text' => '1/3'],
                ['value' => 'c', 'text' => '1/4'],
                ['value' => 'd', 'text' => '2/4']
            ]
        ],
        [
            'text' => '10. Three friends share 2 candy bars equally. What fraction of a candy bar does each friend get?',
            'choices' => [
                ['value' => 'a', 'text' => '1/3'],
                ['value' => 'b', 'text' => '2/3'],
                ['value' => 'c', 'text' => '1/6'],
                ['value' => 'd', 'text' => '3/2']
            ]
        ]
    ]
]

];

// Get the current quiz data
$current_quiz = $quizzes[$quiz_type] ?? null;

if (!$current_quiz) {
    die("Invalid quiz type");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($current_quiz['title']); ?> Quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 70px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .quiz-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .question {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .question p {
            font-size: 18px;
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-size: 16px;
            margin: 8px 0;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        label:hover {
            background-color: #f8f9fa;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
        #result {
            display: none;
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
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
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="quiz-container">
        <h1><?php echo htmlspecialchars($current_quiz['title']); ?></h1>
        <form id="quiz-form" method="post" action="quiz.php">
            <input type="hidden" name="quiz_title" value="<?php echo htmlspecialchars($current_quiz['title']); ?>">
            <input type="hidden" name="subject" value="<?php echo htmlspecialchars($current_quiz['subject']); ?>">

            <?php foreach ($current_quiz['questions'] as $index => $question): ?>
                <div class="question">
                    <p><?php echo htmlspecialchars($question['text']); ?></p>
                    <?php foreach ($question['choices'] as $choice): ?>
                        <label>
                            <input type="radio" name="q<?php echo $index + 1; ?>" 
                                   value="<?php echo htmlspecialchars($choice['value']); ?>" required>
                            <?php echo htmlspecialchars($choice['text']); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <button type="submit" id="submit-button">Submit Quiz</button>
        </form>
        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quizForm = document.getElementById("quiz-form");
            const submitButton = document.getElementById("submit-button");
            const resultDiv = document.getElementById("result");
            const lessonKey = "<?php echo $quiz_type; ?>Score";
            const maxScore = <?php echo count($current_quiz['questions']); ?>;

            quizForm.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                resultDiv.style.display = "block";
                resultDiv.textContent = "Submitting quiz...";
                quizForm.submit();
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?> 