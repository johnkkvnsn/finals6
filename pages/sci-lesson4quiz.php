<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Human Body Quiz</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
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
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
  <h1>Simple Quiz</h1>
  <form id="quiz-form" method="post" action="submit_quiz.php">
    <input type="hidden" name="quiz_title" value="Human Body">
    <input type="hidden" name="subject" value="Science">
    <input type="hidden" id="quiz-score" name="score" value="">
    <div class="question">
      <p>1. How many bones are in the human body?</p>
      <label><input type="radio" name="q1" value="a"> 106</label>
      <label><input type="radio" name="q1" value="b"> 156</label>
      <label><input type="radio" name="q1" value="c"> 206</label>
      <label><input type="radio" name="q1" value="d"> 306</label>
    </div>
    <div class="question">
      <p>2. Which system includes your heart and blood vessels?</p>
      <label><input type="radio" name="q2" value="a"> Respiratory system</label>
      <label><input type="radio" name="q2" value="b"> Circulatory system</label>
      <label><input type="radio" name="q2" value="c"> Digestive system</label>
      <label><input type="radio" name="q2" value="d"> Muscular system</label>
    </div>
    <div class="question">
      <p>3. What is the main job of the skeletal system?</p>
      <label><input type="radio" name="q3" value="a"> To digest food</label>
      <label><input type="radio" name="q3" value="b"> To pump blood</label>
      <label><input type="radio" name="q3" value="c"> To support and protect the body</label>
      <label><input type="radio" name="q3" value="d"> To think and control movements</label>
    </div>
    <div class="question">
      <p>4. Which system helps you breathe?</p>
      <label><input type="radio" name="q4" value="a"> Digestive system</label>
      <label><input type="radio" name="q4" value="b"> Circulatory system</label>
      <label><input type="radio" name="q4" value="c"> Respiratory system</label>
      <label><input type="radio" name="q4" value="d"> Muscular system</label>
    </div>
    <div class="question">
      <p>5. About how many times does a person breathe each day?</p>
      <label><input type="radio" name="q5" value="a"> 2,000</label>
      <label><input type="radio" name="q5" value="b"> 20,000</label>
      <label><input type="radio" name="q5" value="c"> 200,000</label>
      <label><input type="radio" name="q5" value="d"> 2,000,000</label>
    </div>
    <div class="question">
      <p>6. Which is NOT part of the digestive system?</p>
      <label><input type="radio" name="q6" value="a"> Mouth</label>
      <label><input type="radio" name="q6" value="b"> Stomach</label>
      <label><input type="radio" name="q6" value="c"> Lungs</label>
      <label><input type="radio" name="q6" value="d"> Intestines</label>
    </div>
    <div class="question">
      <p>7. Which part of the body contains the brain?</p>
      <label><input type="radio" name="q7" value="a"> Torso</label>
      <label><input type="radio" name="q7" value="b"> Head</label>
      <label><input type="radio" name="q7" value="c"> Arms</label>
      <label><input type="radio" name="q7" value="d"> Legs</label>
    </div>
    <div class="question">
      <p>8. Which system breaks down food into nutrients your body can use?</p>
      <label><input type="radio" name="q8" value="a"> Circulatory system</label>
      <label><input type="radio" name="q8" value="b"> Respiratory system</label>
      <label><input type="radio" name="q8" value="c"> Digestive system</label>
      <label><input type="radio" name="q8" value="d"> Skeletal system</label>
    </div>
    <div class="question">
      <p>9. Which is NOT a way to keep your body healthy?</p>
      <label><input type="radio" name="q9" value="a"> Eating fruits and vegetables</label>
      <label><input type="radio" name="q9" value="b"> Drinking water</label>
      <label><input type="radio" name="q9" value="c"> Staying up late every night</label>
      <label><input type="radio" name="q9" value="d"> Regular exercise</label>
    </div>
    <div class="question">
      <p>10. Which system works with bones to help you move?</p>
      <label><input type="radio" name="q10" value="a"> Digestive system</label>
      <label><input type="radio" name="q10" value="b"> Muscular system</label>
      <label><input type="radio" name="q10" value="c"> Respiratory system</label>
      <label><input type="radio" name="q10" value="d"> Circulatory system</label>
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
    const lessonKey = "lesson4Score";
    const maxScore = 10;

    quizForm.addEventListener("submit", function (event) {
      event.preventDefault();

      let score = 0;
      const answers = {
          q1: "c",
          q2: "b",
          q3: "c",
          q4: "c",
          q5: "b",
          q6: "c",
          q7: "b",
          q8: "c",
          q9: "c",
          q10: "b",
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
