<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Weather and Seasons Quiz</title>
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
    <input type="hidden" name="quiz_title" value="Weather and Seasons">
    <input type="hidden" name="subject" value="Science">
    <input type="hidden" id="quiz-score" name="score" value="">
    <div class="question">
      <p>1. Which season is usually the hottest in the Northern Hemisphere?</p>
      <label><input type="radio" name="q1" value="a"> Spring</label>
      <label><input type="radio" name="q1" value="b"> Summer</label>
      <label><input type="radio" name="q1" value="c"> Fall/Autumn</label>
      <label><input type="radio" name="q1" value="d"> Winter</label>
    </div>
    <div class="question">
      <p>2. What tool is used to measure temperature?</p>
      <label><input type="radio" name="q2" value="a"> Barometer</label>
      <label><input type="radio" name="q2" value="b"> Rain gauge</label>
      <label><input type="radio" name="q2" value="c"> Thermometer</label>
      <label><input type="radio" name="q2" value="d"> Anemometer</label>
    </div>
    <div class="question">
      <p>3. During which season do leaves usually change color and fall from trees?</p>
      <label><input type="radio" name="q3" value="a"> Summer</label>
      <label><input type="radio" name="q3" value="b"> Winter</label>
      <label><input type="radio" name="q3" value="c"> Spring</label>
      <label><input type="radio" name="q3" value="d"> Fall/Autumn</label>
    </div>
    <div class="question">
      <p>4. Which type of weather has water falling from clouds?</p>
      <label><input type="radio" name="q4" value="a"> Sunny</label>
      <label><input type="radio" name="q4" value="b"> Rainy</label>
      <label><input type="radio" name="q4" value="c"> Cloudy</label>
      <label><input type="radio" name="q4" value="d"> Windy</label>
    </div>
    <div class="question">
      <p>5. When the sky is covered with clouds but no rain is falling, we call this weather:</p>
      <label><input type="radio" name="q5" value="a"> Sunny</label>
      <label><input type="radio" name="q5" value="b"> Stormy</label>
      <label><input type="radio" name="q5" value="c"> Cloudy</label>
      <label><input type="radio" name="q5" value="d"> Clear</label>
    </div>
    <div class="question">
      <p>6. In the Northern Hemisphere, which months are usually winter?</p>
      <label><input type="radio" name="q6" value="a"> March, April, May</label>
      <label><input type="radio" name="q6" value="b"> June, July, August</label>
      <label><input type="radio" name="q6" value="c"> September, October, November</label>
      <label><input type="radio" name="q6" value="d"> December, January, February</label>
    </div>
    <div class="question">
      <p>7. What tool measures how much rain has fallen?</p>
      <label><input type="radio" name="q7" value="a"> Thermometer</label>
      <label><input type="radio" name="q7" value="b"> Rain gauge</label>
      <label><input type="radio" name="q7" value="c"> Anemometer</label>
      <label><input type="radio" name="q7" value="d"> Barometer</label>
    </div>
    <div class="question">
      <p>8. Which season usually has the shortest days with the least sunlight?</p>
      <label><input type="radio" name="q8" value="a"> Spring</label>
      <label><input type="radio" name="q8" value="b"> Summer</label>
      <label><input type="radio" name="q8" value="c"> Fall/Autumn</label>
      <label><input type="radio" name="q8" value="d"> Winter</label>
    </div>
    <div class="question">
      <p>9. When low clouds form near the ground making it hard to see, we call this:</p>
      <label><input type="radio" name="q9" value="a"> Rainy</label>
      <label><input type="radio" name="q9" value="b"> Foggy</label>
      <label><input type="radio" name="q9" value="c"> Windy</label>
      <label><input type="radio" name="q9" value="d"> Snowy</label>
    </div>
    <div class="question">
      <p>10. What measures how fast the wind is moving?</p>
      <label><input type="radio" name="q10" value="a"> Rain gauge</label>
      <label><input type="radio" name="q10" value="b"> Thermometer</label>
      <label><input type="radio" name="q10" value="c"> Anemometer</label>
      <label><input type="radio" name="q10" value="d"> Barometer</label>
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
    const lessonKey = "lesson3Score";
    const maxScore = 10;

    quizForm.addEventListener("submit", function (event) {
      event.preventDefault();

      let score = 0;
      const answers = {
          q1: "b",
          q2: "c",
          q3: "d",
          q4: "b",
          q5: "c",
          q6: "d",
          q7: "b",
          q8: "d",
          q9: "b",
          q10: "c"
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
