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
    <a class="navbar-brand" href="dashboard.html">EduPlatform</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
      <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
      <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#announcementModal"><i class="fas fa-bullhorn"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

 <!-- Content -->
<div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">Lesson 2: Basic Addition and Subtraction</h2>
  
    <div class="section-card">
      <div class="section-header">Addition: Putting Together</div>
      <div class="section-body">
        <p>Addition means combining or putting together.</p>
        <p><strong>Symbol:</strong> + (plus)</p>
        <p><strong>Examples:</strong></p>
        <ul>
          <li>3 + 2 = 5</li>
          <li>7 + 4 = 11</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Addition Strategies</div>
      <div class="section-body">
        <ul>
          <li><strong>Counting On:</strong> Start with the larger number and count forward. <br>For 5 + 3, start at 5 and count: "6, 7, 8"</li>
          <li><strong>Making Ten:</strong> Use combinations that make 10. <br>For 8 + 5, think: 8 + 2 = 10, then 10 + 3 = 13</li>
          <li><strong>Doubles:</strong> Memorize doubles like 2+2, 3+3, etc. <br>6 + 6 = 12</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Subtraction: Taking Away</div>
      <div class="section-body">
        <p>Subtraction means taking away or finding the difference.</p>
        <p><strong>Symbol:</strong> - (minus)</p>
        <p><strong>Examples:</strong></p>
        <ul>
          <li>8 - 3 = 5</li>
          <li>12 - 7 = 5</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Subtraction Strategies</div>
      <div class="section-body">
        <ul>
          <li><strong>Counting Back:</strong> Start with the larger number and count backward. <br>For 7 - 3, start at 7 and count back: "6, 5, 4"</li>
          <li><strong>Think Addition:</strong> Use related addition facts. <br>For 10 - 6 = ?, think: 6 + ? = 10</li>
          <li><strong>Using a Number Line:</strong> Jump backward on a number line.</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Fact Families</div>
      <div class="section-body">
        <p>Addition and subtraction facts that use the same numbers:</p>
        <ul>
          <li>6 + 4 = 10</li>
          <li>4 + 6 = 10</li>
          <li>10 - 4 = 6</li>
          <li>10 - 6 = 4</li>
        </ul>
      </div>
    </div>
  </div>
  

  
  <!-- Done Button -->
<div class="container text-center my-5">
    <a href="math.php" class="btn btn-success btn-lg px-5">Done</a>
  </div>
  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>