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
        <li class="nav-item"><a class="nav-link" href="dashboard.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <!-- Content -->
<div class="container mt-4">
  <h2 class="text-success mb-4 font-weight-bold">Lesson 1: Numbers and Counting</h2>

  <div class="section-card">
    <div class="section-header">What Are Numbers?</div>
    <div class="section-body">
      <p>Numbers are symbols that represent quantities. When we count objects, we use numbers to tell how many there are.</p>
    </div>
  </div>

  <div class="section-card">
    <div class="section-header">Number Recognition (0–100)</div>
    <div class="section-body">
      <p><strong>Single-digit numbers (0–9):</strong> 0, 1, 2, 3, 4, 5, 6, 7, 8, 9</p>
      <p><strong>Two-digit numbers (10–99):</strong> 10, 11, 12... 98, 99</p>
      <p><strong>Three-digit number:</strong> 100</p>
    </div>
  </div>

  <div class="section-card">
    <div class="section-header">Counting Principles</div>
    <div class="section-body">
      <ul>
        <li><strong>One-to-one correspondence:</strong> Match each object with exactly one number word.</li>
        <li><strong>Stable order:</strong> Always count in the same order (1, 2, 3...).</li>
        <li><strong>Cardinality:</strong> The last number you say tells how many objects there are in total.</li>
      </ul>
    </div>
  </div>

  <div class="section-card">
    <div class="section-header">Number Line</div>
    <div class="section-body">
      <p>A number line helps us visualize numbers in order:</p>
      <pre>0---1---2---3---4---5---6---7---8---9---10→</pre>
    </div>
  </div>

  <div class="section-card">
    <div class="section-header">Place Value</div>
    <div class="section-body">
      <p>Numbers have different values depending on their position:</p>
      <ul>
        <li>In <strong>23</strong>: the <strong>2</strong> means 2 tens (20)</li>
        <li>In <strong>23</strong>: the <strong>3</strong> means 3 ones (3)</li>
      </ul>
    </div>
  </div>

  <div class="section-card">
    <div class="section-header">Comparing Numbers</div>
    <div class="section-body">
      <p>We use these symbols to compare numbers:</p>
      <ul>
        <li><strong>&gt;</strong> (greater than)</li>
        <li><strong>&lt;</strong> (less than)</li>
        <li><strong>=</strong> (equal to)</li>
      </ul>
      <p>Example: <strong>7 &gt; 4</strong> (7 is greater than 4)</p>
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
</body>
</html>