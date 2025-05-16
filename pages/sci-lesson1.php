<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - EduPlatform</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
      font-size: 1.1rem;
      line-height: 1.6;
    }
    .section-card {
      margin-bottom: 30px;
      border-left: 6px solid #28a745;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    .section-header {
      background-color: #e9f7ef;
      padding: 15px 20px;
      font-weight: bold;
      font-size: 1.4rem;
      color: #28a745;
      border-bottom: 1px solid #dee2e6;
    }
    .section-body {
      padding: 20px;
      font-size: 1.1rem;
    }
    .section-body img {
      max-width: 100%;
      height: auto;
      max-height: 250px;
      display: block;
      margin: 20px auto;
    }
  </style>
  
</head>
<body>

  <!-- Navbar -->
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

  <!-- Content -->
  <div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">Lesson 1: The Five Senses</h2>

    <div class="section-card">
      <div class="section-header">Senses Introduction</div>
      <div class="section-body">
        <ul>
          <li>Humans have five main senses: <strong>sight, hearing, touch, smell, and taste</strong>.</li>
          <li>Each sense has a special organ: <strong>eyes, ears, skin, nose, and tongue</strong>.</li>
          <li>Our senses help us understand the world around us.</li>
        </ul>
        <img src="images/humansenses.png" alt="Human Senses">
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Sight (Vision) - Eyes</div>
      <div class="section-body">
        <img src="images/sight.png" alt="Sight">
        <p>Helps us see colors, shapes, and movement.</p>
        <p>Examples: reading books, watching movies, seeing traffic lights.</p>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Hearing (Audition) - Ears</div>
      <div class="section-body">
        <img src="images/hear.png" alt="Hearing">
        <p>Helps us detect sounds and their location.</p>
        <p>Examples: listening to music, hearing alarms, understanding speech.</p>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Touch (Tactile) - Skin</div>
      <div class="section-body">
        <img src="images/touch.png" alt="Touch">
        <p>Helps us feel texture, temperature, pressure, and pain.</p>
        <p>Examples: feeling hot/cold, rough/smooth, soft/hard objects.</p>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Smell (Olfaction) - Nose</div>
      <div class="section-body">
        <img src="images/smell.png" alt="Smell">
        <p>Helps us detect odors in the air.</p>
        <p>Examples: smelling flowers, food cooking, smoke from fire.</p>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Taste (Gustation) - Tongue</div>
      <div class="section-body">
        <img src="images/taste.png" alt="Taste">
        <p>Helps us detect flavors in food.</p>
        <p>Main tastes: sweet, salty, sour, bitter, umami (savory).</p>
      </div>
    </div>

  </div>
  
  <!-- Done Button -->
<div class="container text-center my-5">
    <a href="science.php" class="btn btn-success btn-lg px-5">Done</a>
  </div>
  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
