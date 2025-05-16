<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>The Five Senses Quiz</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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
    }
    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }
    .question p {
      font-size: 18px;
      margin-top: 10px;
    }
    label {
      display: block;
      font-size: 16px;
      margin: 5px 0;
    }
    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
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
      color: black; /* default color */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
  </div>
</nav>

<div class="quiz-container">
  <h1>Simple Quiz</h1>
  <form id="quiz-form" method="post" action="submit_quiz.php">
    <input type="hidden" name="quiz_title" value="The Five Senses">
    <input type="hidden" name="subject" value="Science">
    <input type="hidden" id="quiz-score" name="score" value="">

    <!-- Your questions here... (omitted for brevity, same as before) -->
    <div class="question">
      <p>1. Which sense organ helps us see colors and shapes?</p>
      <label><input type="radio" name="q1" value="a"> Ears</label>
      <label><input type="radio" name="q1" value="b"> Eyes</label>
      <label><input type="radio" name="q1" value="c"> Nose</label>
      <label><input type="radio" name="q1" value="d"> Tongue</label>
    </div>
    <div class="question">
      <p>2. The ability to hear sounds is called:</p>
      <label><input type="radio" name="q2" value="a"> Vision</label>
      <label><input type="radio" name="q2" value="b"> Tactile</label>
      <label><input type="radio" name="q2" value="c"> Audition</label>
      <label><input type="radio" name="q2" value="d"> Olfaction</label>
    </div>
    <div class="question">
      <p>3. Which of these is NOT one of the five main senses?</p>
      <label><input type="radio" name="q3" value="a"> Sight</label>
      <label><input type="radio" name="q3" value="b"> Touch</label>
      <label><input type="radio" name="q3" value="c"> Balance</label>
      <label><input type="radio" name="q3" value="d"> Smell</label>
    </div>
    <div class="question">
      <p>4. Which sense helps you feel if something is hot or cold?</p>
      <label><input type="radio" name="q4" value="a"> Taste</label>
      <label><input type="radio" name="q4" value="b"> Touch</label>
      <label><input type="radio" name="q4" value="c"> Sight</label>
      <label><input type="radio" name="q4" value="d"> Hearing</label>
    </div>
    <div class="question">
      <p>5. What is the main sense organ for taste?</p>
      <label><input type="radio" name="q5" value="a"> Skin</label>
      <label><input type="radio" name="q5" value="b"> Tongue</label>
      <label><input type="radio" name="q5" value="c"> Ears</label>
      <label><input type="radio" name="q5" value="d"> Eyes</label>
    </div>
    <div class="question">
      <p>6. Which taste can you detect when eating a lemon?</p>
      <label><input type="radio" name="q6" value="a"> Sweet</label>
      <label><input type="radio" name="q6" value="b"> Salty</label>
      <label><input type="radio" name="q6" value="c"> Sour</label>
      <label><input type="radio" name="q6" value="d"> Bitter</label>
    </div>
    <div class="question">
      <p>7. Your nose helps you with which sense?</p>
      <label><input type="radio" name="q7" value="a"> Taste</label>
      <label><input type="radio" name="q7" value="b"> Touch</label>
      <label><input type="radio" name="q7" value="c"> Smell</label>
      <label><input type="radio" name="q7" value="d"> Hearing</label>
    </div>
    <div class="question">
      <p>8. When you feel something soft or rough, which sense are you using?</p>
      <label><input type="radio" name="q8" value="a"> Touch</label>
      <label><input type="radio" name="q8" value="b"> Sight</label>
      <label><input type="radio" name="q8" value="c"> Taste</label>
      <label><input type="radio" name="q8" value="d"> Smell</label>
    </div>
    <div class="question">
      <p>9. What helps you know if music is loud or quiet?</p>
      <label><input type="radio" name="q9" value="a"> Smell</label>
      <label><input type="radio" name="q9" value="b"> Taste</label>
      <label><input type="radio" name="q9" value="c"> Touch</label>
      <label><input type="radio" name="q9" value="d"> Hearing</label>
    </div>
    <div class="question">
      <p>10. If you close your eyes and identify an apple by its smell, which sense are you using?</p>
      <label><input type="radio" name="q10" value="a"> Taste</label>
      <label><input type="radio" name="q10" value="b"> Touch</label>
      <label><input type="radio" name="q10" value="c"> Smell</label>
      <label><input type="radio" name="q10" value="d"> Sight</label>
    </div>

    <button type="submit" id="submit-button">Submit Quiz</button>
  </form>

  <div id="result"></div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const quizForm = document.getElementById("quiz-form");
    const scoreInput = document.getElementById("quiz-score");
    const submitButton = document.getElementById("submit-button");
    const lessonKey = "lesson1Score";
    const maxScore = 10;

    quizForm.addEventListener("submit", function (event) {
      event.preventDefault();

      let score = 0;
      const answers = {
        q1: "b", q2: "c", q3: "c", q4: "b", q5: "b",
        q6: "c", q7: "c", q8: "a", q9: "d", q10: "c"
      };

      const formData = new FormData(quizForm);
      for (let question in answers) {
        if (formData.get(question) === answers[question]) {
          score++;
        }
      }

      scoreInput.value = score;

      const currentScore = localStorage.getItem(lessonKey);
      if (currentScore === null || score > parseInt(currentScore)) {
        localStorage.setItem(lessonKey, score);
      }

      submitButton.disabled = true;

      const resultDiv = document.getElementById("result");
      resultDiv.style.display = "block";
      resultDiv.textContent = `Your score: ${score} / ${maxScore}`;

      if (score >= 7) {
        resultDiv.style.color = "green";
      } else {
        resultDiv.style.color = "black";
      }

      quizForm.submit();
    });
  });
</script>

</body>
</html>
