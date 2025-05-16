<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz</title>
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
            max-width: 500px;
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
    <input type="hidden" name="quiz_title" value="Plants and Animals">
    <input type="hidden" name="subject" value="Science">
<input type="hidden" id="quiz-score" name="score" value="">

    <div class="question">
      <p>1. What do plants need to make their own food?</p>
      <label><input type="radio" name="q1" value="a"> Meat</label>
      <label><input type="radio" name="q1" value="b"> Sunlight</label>
      <label><input type="radio" name="q1" value="c"> Soil only</label>
      <label><input type="radio" name="q1" value="d"> Other plants</label>
    </div>

    <div class="question">
      <p>2. Which part of a plant absorbs water from the soil?</p>
      <label><input type="radio" name="q2" value="a"> Leaves</label>
      <label><input type="radio" name="q2" value="b"> Stem</label>
      <label><input type="radio" name="q2" value="c"> Roots</label>
      <label><input type="radio" name="q2" value="d"> Flowers</label>
    </div>

    <div class="question">
      <p>3. Animals that have fur, produce milk, and are warm-blooded are called:</p>
      <label><input type="radio" name="q3" value="a"> Reptiles</label>
      <label><input type="radio" name="q3" value="b"> Amphibians</label>
      <label><input type="radio" name="q3" value="c"> Mammals</label>
      <label><input type="radio" name="q3" value="d"> Birds</label>
    </div>

    <div class="question">
      <p>4. Which animal group has feathers and lays eggs?</p>
      <label><input type="radio" name="q4" value="a"> Fish</label>
      <label><input type="radio" name="q4" value="b"> Birds</label>
      <label><input type="radio" name="q4" value="c"> Mammals</label>
      <label><input type="radio" name="q4" value="d"> Insects</label>
    </div>

    <div class="question">
      <p>5. How many legs do insects have?</p>
      <label><input type="radio" name="q5" value="a"> Four</label>
      <label><input type="radio" name="q5" value="b"> Six</label>
      <label><input type="radio" name="q5" value="c"> Eight</label>
      <label><input type="radio" name="q5" value="d"> Ten</label>
    </div>

    <div class="question">
      <p>6. Which is NOT a characteristic of living things?</p>
      <label><input type="radio" name="q6" value="a"> They need food</label>
      <label><input type="radio" name="q6" value="b"> They grow and change</label>
      <label><input type="radio" name="q6" value="c"> They can reproduce</label>
      <label><input type="radio" name="q6" value="d"> They are all the same size</label>
    </div>

    <div class="question">
      <p>7. Which animal group lives part of its life in water and part on land?</p>
      <label><input type="radio" name="q7" value="a"> Reptiles</label>
      <label><input type="radio" name="q7" value="b"> Mammals</label>
      <label><input type="radio" name="q7" value="c"> Birds</label>
      <label><input type="radio" name="q7" value="d"> Amphibians</label>
    </div>

    <div class="question">
      <p>8. What is the main job of a plant's leaves?</p>
      <label><input type="radio" name="q8" value="a"> Absorb water</label>
      <label><input type="radio" name="q8" value="b"> Support the plant</label>
      <label><input type="radio" name="q8" value="c"> Make food using sunlight</label>
      <label><input type="radio" name="q8" value="d"> Attract insects</label>
    </div>

    <div class="question">
      <p>9. Animals with scales and cold blood that usually live on land are:</p>
      <label><input type="radio" name="q9" value="a"> Fish</label>
      <label><input type="radio" name="q9" value="b"> Reptiles</label>
      <label><input type="radio" name="q9" value="c"> Mammals</label>
      <label><input type="radio" name="q9" value="d"> Birds</label>
    </div>

    <div class="question">
      <p>10. Which part of a plant helps create new plants?</p>
      <label><input type="radio" name="q10" value="a"> Roots</label>
      <label><input type="radio" name="q10" value="b"> Stems</label>
      <label><input type="radio" name="q10" value="c"> Leaves</label>
      <label><input type="radio" name="q10" value="d"> Seeds</label>
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
    const lessonKey = "lesson2Score";
    const maxScore = 10;

    quizForm.addEventListener("submit", function (event) {
      event.preventDefault();

      let score = 0;
      const answers = {
        q1: "b", q2: "c", q3: "c", q4: "b", q5: "b",
        q6: "d", q7: "d", q8: "c", q9: "b", q10: "d"
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