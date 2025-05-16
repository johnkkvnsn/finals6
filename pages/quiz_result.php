<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Retrieve the score and quiz information from the session
$score = $_SESSION['score'] ?? 0;
$total_questions = $_SESSION['total_questions'] ?? 10;
$quiz_title = $_SESSION['quiz_title'] ?? '';
$subject = $_SESSION['subject'] ?? '';

// Calculate percentage
$percentage = ($score / $total_questions) * 100;

// Determine message and color based on score
if ($percentage >= 80) {
    $message = "Congratulations! You're awesome! 🎉";
    $color = "success";
} elseif ($percentage >= 50) {
    $message = "You did well! Keep practicing! 🌟";
    $color = "primary";
} else {
    $message = "Failed! Study more! 📚";
    $color = "danger";
}

// Determine the back button URL based on subject
$back_url = match($subject) {
    'Mathematics' => 'math.php',
    'English' => 'english.php',
    'Science' => 'science.php',
    default => 'dashboard.php'
};
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        .popper {
            position: fixed;
            background: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            font-size: 1.2em;
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        .popper.show {
            opacity: 1;
            transform: translateY(0);
        }
        .score-display {
            font-size: 2.5em;
            font-weight: bold;
            margin: 20px 0;
            color: #28a745;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .message-display {
            font-size: 1.5em;
            margin: 20px 0;
            color: inherit;
        }
        .quiz-title {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }
        .percentage-display {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 20px;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
        .bounce {
            animation: bounce 1s ease infinite;
        }
        .button-container {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            padding: 10px 25px;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-success mb-4">Quiz Completed!</h1>
        
        <div class="quiz-title">
            <?php echo htmlspecialchars($quiz_title); ?>
        </div>

        <div class="score-display">
            <span id="score">0</span>/<?php echo $total_questions; ?>
        </div>


        <div class="message-display text-<?php echo $color; ?>">
            <?php echo $message; ?>
        </div>

        <div class="button-container">
            <a class="btn btn-success" href="<?php echo $back_url; ?>">Back to Lessons</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Animate score counting up
        const finalScore = <?php echo $score; ?>;
        const scoreElement = document.getElementById('score');
        let currentScore = 0;
        
        function updateScore() {
            if (currentScore < finalScore) {
                currentScore++;
                scoreElement.textContent = currentScore;
                setTimeout(updateScore, 100);
            }
        }

        // Start the animation when page loads
        window.onload = function() {
            updateScore();
            <?php if ($percentage >= 80): ?>
            // Show celebratory poppers for high scores
            showCelebrationPoppers();
            <?php endif; ?>
        };

        <?php if ($percentage >= 80): ?>
        function createPopper() {
            const messages = [
                "Amazing! 🎉",
                "Perfect! ⭐",
                "Outstanding! 🌟",
                "Brilliant! 💫",
                "You're a star! ✨"
            ];
            const popper = document.createElement('div');
            popper.className = 'popper text-success';
            popper.textContent = messages[Math.floor(Math.random() * messages.length)];
            document.body.appendChild(popper);
            return popper;
        }

        function showPopper() {
            const popper = createPopper();
            const reference = {
                getBoundingClientRect: () => ({
                    top: window.innerHeight / 2,
                    left: window.innerWidth / 2,
                    right: window.innerWidth / 2,
                    bottom: window.innerHeight / 2,
                    width: 0,
                    height: 0
                })
            };

            const popperInstance = Popper.createPopper(reference, popper, {
                placement: 'top',
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 20]
                        }
                    }
                ]
            });

            setTimeout(() => {
                popper.classList.add('show');
            }, 100);

            setTimeout(() => {
                popper.classList.remove('show');
                setTimeout(() => {
                    popper.remove();
                    popperInstance.destroy();
                }, 300);
            }, 2000);
        }

        function showCelebrationPoppers() {
            // Initial burst of poppers
            for (let i = 0; i < 5; i++) {
                setTimeout(() => {
                    showPopper();
                }, i * 300);
            }

            // Trigger confetti cannon
            const duration = 3 * 1000;
            const animationEnd = Date.now() + duration;
            const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            const interval = setInterval(function() {
                const timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                const particleCount = 50 * (timeLeft / duration);
                
                confetti({
                    ...defaults,
                    particleCount,
                    origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 }
                });
                confetti({
                    ...defaults,
                    particleCount,
                    origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 }
                });
            }, 250);

            // Show popper on click
            document.addEventListener('click', (e) => {
                if (Math.random() < 0.3) {
                    showPopper();
                    confetti({
                        particleCount: 30,
                        spread: 70,
                        origin: { y: 0.6 }
                    });
                }
            });
        }
        <?php endif; ?>
    </script>
</body>
</html>
