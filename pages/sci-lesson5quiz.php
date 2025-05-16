<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>States of Matter Quiz</title>
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
    <input type="hidden" name="quiz_title" value="States of Matter">
    <input type="hidden" name="subject" value="Science">
    <input type="hidden" id="quiz-score" name="score" value="">
    <div class="question">
      <p>1. Which state of matter has a definite shape and volume?</p>
      <label><input type="radio" name="q1" value="a"> Solid</label>
      <label><input type="radio" name="q1" value="b"> Liquid</label>
      <label><input type="radio" name="q1" value="c"> Gas</label>
      <label><input type="radio" name="q1" value="d"> Plasma</label>
    </div>
    <div class="question">
      <p>2. When ice melts into water, it changes from a:</p>
      <label><input type="radio" name="q2" value="a"> Liquid to a solid</label>
      <label><input type="radio" name="q2" value="b"> Solid to a liquid</label>
      <label><input type="radio" name="q2" value="c"> Liquid to a gas</label>
      <label><input type="radio" name="q2" value="d"> Gas to a liquid</label>
    </div>
    <div class="question">
      <p>3. Which state of matter can flow and take the shape of its container?</p>
      <label><input type="radio" name="q3" value="a"> Solid only</label>
      <label><input type="radio" name="q3" value="b"> Liquid only</label>
      <label><input type="radio" name="q3" value="c"> Gas only</label>
      <label><input type="radio" name="q3" value="d"> Both liquid and gas</label>
    </div>
    <div class="question">
      <p>4. When water evaporates, it changes from a:</p>
      <label><input type="radio" name="q4" value="a"> Solid to a liquid</label>
      <label><input type="radio" name="q4" value="b"> Liquid to a solid</label>
      <label><input type="radio" name="q4" value="c"> Liquid to a gas</label>
      <label><input type="radio" name="q4" value="d"> Gas to a liquid</label>
    </div>
    <div class="question">
      <p>5. Water turning to ice is an example of:</p>
      <label><input type="radio" name="q5" value="a"> Melting</label>
      <label><input type="radio" name="q5" value="b"> Freezing</label>
      <label><input type="radio" name="q5" value="c"> Evaporation</label>
      <label><input type="radio" name="q5" value="d"> Condensation</label>
    </div>
    <div class="question">
      <p>6. In which state of matter are particles packed tightly together?</p>
      <label><input type="radio" name="q6" value="a"> Solid</label>
      <label><input type="radio" name="q6" value="b"> Liquid</label>
      <label><input type="radio" name="q6" value="c"> Gas</label>
      <label><input type="radio" name="q6" value="d"> All states have particles equally spaced</label>
    </div>
    <div class="question">
      <p>7. When water vapor changes back to liquid water, this is called:</p>
      <label><input type="radio" name="q7" value="a"> Evaporation</label>
      <label><input type="radio" name="q7" value="b"> Freezing</label>
      <label><input type="radio" name="q7" value="c"> Melting</label>
      <label><input type="radio" name="q7" value="d"> Condensation</label>
    </div>
    <div class="question">
      <p>8. Which is NOT an example of a solid?</p>
      <label><input type="radio" name="q8" value="a"> Rock</label>
      <label><input type="radio" name="q8" value="b"> Air</label>
      <label><input type="radio" name="q8" value="c"> Wood</label>
      <label><input type="radio" name="q8" value="d"> Plastic</label>
    </div>
    <div class="question">
      <p>9. Which states of matter have particles that can move around?</p>
      <label><input type="radio" name="q9" value="a"> Solids only</label>
      <label><input type="radio" name="q9" value="b"> Liquids and gases</label>
      <label><input type="radio" name="q9" value="c"> Gases only</label>
      <label><input type="radio" name="q9" value="d"> All states of matter</label>
    </div>
    <div class="question">
      <p>10. Fog on a bathroom mirror after a hot shower is an example of:</p>
      <label><input type="radio" name="q10" value="a"> Evaporation</label>
      <label><input type="radio" name="q10" value="b"> Freezing</label>
      <label><input type="radio" name="q10" value="c"> Condensation</label>
      <label><input type="radio" name="q10" value="d"> Melting</label>
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
    const lessonKey = "lesson5Score";
    const maxScore = 10;

    quizForm.addEventListener("submit", function (event) {
      event.preventDefault();

      let score = 0;
      const answers = {
          q1: "a",
          q2: "b",
          q3: "d",
          q4: "c",
          q5: "b",
          q6: "a",
          q7: "d",
          q8: "b",
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
